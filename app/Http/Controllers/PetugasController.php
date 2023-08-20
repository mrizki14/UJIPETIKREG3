<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Models\PelangganFoto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ValidatorRevisiNotification;
use App\Notifications\PelangganCreatedNotification;
use App\Notifications\ValidatorCreatedNotification;

class PetugasController extends Controller
{
    public function index() {
        $areas = [
            "BDG" => 'BANDUNG',
            "BGB" => 'BANDUNG BARAT',
            "CRB" => 'CIREBON',
            "KRW" => 'KARAWANG',
            "SKB" => 'SUKABUMI',
            "TSM" => 'TASIKMALAYA'
        ];
        $pelanggansIndex = Pelanggan::with('fotos:id,pelanggans_id,status')->get();
        $pelanggansRevisi = Pelanggan::whereHas('fotos', function ($query) {
            $query->where('status', 'NOK');
        })->with(['fotos' => function ($query) {
            $query->select('id', 'pelanggans_id', 'status');
        }])->get();

        $revisiData = [];
        foreach ($pelanggansRevisi as $pelanggan) {
            foreach ($pelanggan->fotos as $foto) {
                $revisiData[] = [
                    'selisih_waktu' => Carbon::parse($foto->updated_at)->diffForHumans(),
                    'catatan_keseluruhan' => $foto->catatan_keseluruhan,
                ];
            }
        }
   
     
        return view('petugas', compact('pelanggansIndex','pelanggansRevisi', 'areas','revisiData' ));
    }

    public function petugasDetail(Request $request,$id) {
        // $notificationId = request('id');
        // if ($notificationId) {
        //     auth()->user()->unreadNotifications->where('id', $notificationId)->first()?->markAsRead();
        // }
        if ($request->query('mark_as_read')) {
            $notificationId = $request->query('notification_id');
            $notification = auth()->user()->notifications->find($notificationId);
            
            if ($notification) {
                $notification->markAsRead();
            }
        }
        $areas = [
            "BDG" => 'BANDUNG',
            "BGB" => 'BANDUNG BARAT',
            "CRB" => 'CIREBON',
            "KRW" => 'KARAWANG',
            "SKB" => 'SUKABUMI',
            "TSM" => 'TASIKMALAYA'
        ];
        $pelanggans = Pelanggan::findOrFail($id);
        $images = PelangganFoto::all();
  
        return view('petugas-detail',[
        'pelanggans' => $pelanggans, 
        'areas' => $areas,
        'images' => $images,
        ]);
       
    }


    public function store(Request $request, $pelanggans_id) {
       
        $validator = Validator::make($request->all(),[
            "file" => "required|image|mimes:jpeg,png,jpg",
            "catatan" => "required",
            "odp" => "nullable"
        ],[
            'file.required' => 'file harus diisi',
            'catatan.required' => 'catatan harus diisi',
        ]);
        $pelanggan = Pelanggan::find($pelanggans_id);

        if ($validator->fails()) {
               return back()
                ->withErrors($validator)
                ->withInput();
        }
        if (!$pelanggan) {
            return redirect()->back()->with('error', 'Pelanggan tidak ditemukan.');
        }
        $file = $request->file('file');
        $input = $request->input('pelanggans_id');
        $odp = $request->input('odp');
        $file_name = time() . '_' . $file->getClientOriginalName();
        $foto = new PelangganFoto([
            'file' => $file_name,
            'catatan' => $request->catatan,
            'odp' => $odp,
            'pelanggans_id' => $input
            
        ]);

        $file->storeAs('public/images', $file_name);
        $pelanggan->fotos()->save($foto);

        $validatorUsers = User::where('role_id', 2)->get();
        $notificationThreshold = 28;
    
        if ($validatorUsers->count() >= $notificationThreshold) {
            Notification::send($validatorUsers, new ValidatorCreatedNotification($pelanggan));
        }

        

        $flashMessage = 'Form ' . $odp . ' berhasil dikirim.';
        session()->flash('form_message_' . $odp, $flashMessage);
        return redirect()->back()->with('success', 'Data pelanggan berhasil dikirim.');

    }

    public function revisiBukti(Request $request,$id) {
        if ($request->query('mark_as_read')) {
            $notificationId = $request->query('notification_id');
            $notification = auth()->user()->notifications->find($notificationId);
            
            if ($notification) {
                $notification->markAsRead();
            }
        }
        $areas = [
            "BDG" => 'BANDUNG',
            "BGB" => 'BANDUNG BARAT',
            "CRB" => 'CIREBON',
            "KRW" => 'KARAWANG',
            "SKB" => 'SUKABUMI',
            "TSM" => 'TASIKMALAYA'
        ];
        $odpDescriptions = [
            'odp_1' => 'Konektor dan Adapter tipe SC-UPC',
            'odp_2' => 'Instalasi kabel, pastikan rapi (tidak ada bending)',
            'odp_3' => 'ODP bersih dari sampah instalasi, debu, air dan
            serangga',
            'odp_4' =>'ODP Memiliki label drop core',
            'odp_5'=> 'Tidak menggunakan pigtail kearah ke pelanggan',
            'odp_6'=> 'Tidak memasukkan splitter tambahan (ODP gendong)',
            'odp_7'=> 'Kabel drop yang masuk ODP memiliki panjang yang sama
            dan terikat rapi',
            'odp_8'=> 'Kunci dome (Penutup ODP)',
            'odp_9'=> 'Pintu ODP Tertutup/Terkunci',
            'odp_10'=> 'Splitter, pastikan terpasang dengan baik',
            'odp_11'=> 'Port idle, pastikan seluruhnya terpasang dust cap',
            'odp_12'=> 'Bebas dari kabel drop yang sudah tidak terpakai',
            'odp_13'=> 'Pengukuran di ODP (Gunakan OPM)',
            'odp_14'=> 'Seluruh tambatan menggunakan s-clamp (tiang/odp)',
            'odp_15'=> 'Di rumah pelanggan menggunakan clamp hook &amp;
            s-clamp',
            'odp_16'=> 'Tidak terdapat sambungan',
            'odp_17'=> 'Menggunakan OTP',
            'odp_18'=> 'Tidak ada penarikan dropcore di atas 50 m tanpa tiang
            (Penanaman tiang jika diperlukan)',
            'odp_19'=> 'Penggunaan dropcore sesuai list of material',
            'odp_20'=> 'Penggunaan connector sesuai list of material',
            'odp_21'=> 'Instalasi dropcore menggunakan pipa (bila menggunakan
            SPBT)',
            'odp_22'=> 'Messenger di tiang penanggal tidak dipotong',
            'odp_23'=> 'Menggunakan kabel indoor dari OTP ke roset',
            'odp_24'=> 'Roset terpasang dengan kuat dan kokoh dengan konektor
            menghadap ke bawah Minimal 40 cm dari lantai',
            'odp_25'=> 'Rute kabel harus berada di sudut dinding (jangan
            menyilang bidang)',
            'odp_26'=> 'Kabel harus melekat dengan kuat (menggunakan kabel
            tray, clip atau lem)',
            'odp_27'=> 'Kabel melalui jalur yang sudah disiapkan di rumah',
            'odp_28'=> 'Pengukuran Redaman Power ONT Rx Level mengunakan
            Ibooster',
      
        ];
    
        $pelanggans = Pelanggan::with(['fotos' => function ($query) {
            $query->where('status', 'NOK');
        }])
        ->findOrFail($id);

        foreach ($pelanggans->fotos as $foto) {
            $foto->time_diff = Carbon::parse($foto->updated_at)->diffForHumans();
        }
        
        return view('petugas-revisi', compact('pelanggans','areas','odpDescriptions'));
    }

    
    public function updateBukti(Request $request, $id) {
        $request->validate([
            // 'foto_id' => 'required|array',
            'foto_id.*' => 'exists:pelanggan_fotos,id',
            'file.*' => 'required|image|mimes:jpeg,png,jpg',
            'catatan.*' => 'required|string',
        ],[
            'catatan.*.required' => 'Catatan harus diisi.',
            'file.*.required' => 'File harus berupa JPEG,PNG,JPG.',
        ]);
    
        $pelanggan = Pelanggan::findOrFail($id);
        foreach ($pelanggan->fotos as $index => $foto) {
        if ($foto->status === 'NOK') {
            $inputCatatan = $request->input('catatan_' . $foto->id);
            $inputFile = $request->file('file_' . $foto->id);
    
            $updateData = [];

            if (!empty($inputCatatan)) {
                $updateData['catatan'] = $inputCatatan;
            }

            if ($inputFile) {
                $newFileName = $inputFile->getClientOriginalName();
                $inputFile->storeAs('public/images', $newFileName);
                $updateData['file'] = $newFileName;
            }

            if (!empty($updateData)) {
                $foto->update($updateData);
                $validator = User::where('role_id', 2)->get();
                Notification::send($validator, new ValidatorRevisiNotification($pelanggan));
            }
        }
   
    }

    
    return redirect()->route('petugas.index',['id' => $pelanggan->id])
    ->with('success', 'Data revisi berhasil direvisi, tunggu validator untuk cek.');
      
    }
}


