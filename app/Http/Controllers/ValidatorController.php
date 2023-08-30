<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Models\PelangganFoto;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PelangganRevisiNotification;

class ValidatorController extends Controller
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
        
        // $pelangganFoto = Pelanggan::has('fotos','>=', 28)
        // ->with(['fotos' => function ($query) {
        //     $query->select('pelanggans_id', 'file', 'catatan');
        // }])
        // ->get();
        $pelangganFoto = Pelanggan::with(['fotos' => function ($query) {
            $query->select('pelanggans_id', 'file', 'catatan');
        }])
        ->whereHas('fotos', function ($subQuery) {
            $subQuery->where('status', 'progress')
                ->groupBy('pelanggans_id')
                ->havingRaw('COUNT(*) = 28');
        })
        ->get();


        $hasilRevisi = Pelanggan::whereHas('fotos', function ($query) {
            $query->where('status_revisi', 'DIKIRIMKAN');
        })->with(['fotos' => function ($query) {
            $query->select('id', 'pelanggans_id', 'status');
        }])->get();
        
        $revisiData = [];
        foreach ($hasilRevisi as $pelanggan) {
            foreach ($pelanggan->fotos as $foto) {
                $revisiData[] = [
                    'selisih_waktu' => Carbon::parse($foto->updated_at)->diffForHumans(),
                    'catatan_keseluruhan' => $foto->catatan_keseluruhan,
                ];
            }
        }

      
     
        return view('validator', compact('pelangganFoto', 'areas','hasilRevisi'));
    }

    public function validatorDetail(Request $request,$id) {

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

            $cekBukti = PelangganFoto::where('pelanggans_id', $id)->count();

            if ($cekBukti < 28) {
                return redirect()->route('validator.index')->with('errors', 'Bukti kurang cukup petugas harus mengisi semua intruksi.');
            }
            $pelanggansFoto = PelangganFoto::with('pelanggan')
            ->where('pelanggans_id', $id)
            ->orderBy('file','asc')
            // ->orderBy('odp','asc')
            ->get()
            ->groupBy('pelanggans_id')
            ->values();
      
            $revisiData = [];
            foreach ($pelanggansFoto as $collection) {
                foreach ($collection as $foto) {
                    // $catatan = PelangganFoto::where('pelanggans_id', $foto->pelanggan->id)->first();
                    $revisiData[] = [
                        'pelanggan' => $foto->pelanggan, // Dapatkan objek Pelanggan
                        'foto' => $foto, // Dapatkan objek PelangganFoto
                        'selisih_waktu' => Carbon::parse($foto->updated_at)->diffForHumans(),
                    ];
                }
            }
            // dd($revisiData);

            // $odps = ['odp_1', 'odp_2', 'odp_3','odp_4','odp_5', 'odp_7','odp_8','odp_9','odp_10','odp_11','odp_12','odp_13','odp_14','odp_15','odp_16','odp_17','odp_18','odp_19','odp_20','odp_21','odp_21','odp_22','odp_23','odp_24','odp_25','odp_26','odp_27','odp_28'];
          
            return view('validator-detail', compact('pelanggansFoto','areas','revisiData'));
    }



    public function update(Request $request,$id) {

        $request->validate([
            'status' => 'required|array',
            'catatan_keseluruhan' => 'nullable|string',

        ]);

         $statusValues = $request->input('status');
         $catatanKeseluruhan = $request->input('catatan_keseluruhan');
         $alreadyNotified = false;
        foreach ($statusValues as $pelangganId => $statusArray) {
            foreach ($statusArray as $odp => $status) {
                $foto = PelangganFoto::where('pelanggans_id', $pelangganId)
                    ->where('odp', $odp)
                    ->first();
                if ($foto) {
                    $foto->status = $status;
                    $foto->catatan_keseluruhan = $catatanKeseluruhan; 

                    if ($status === 'NOK') {
                        $foto->status_revisi = 'NOK';
                    }
                    
                    $foto->save();

                    

                    if ($status === 'NOK' && !$alreadyNotified) {
                        $pelanggan = Pelanggan::findOrFail($pelangganId);
                        $validator = User::where('role_id', 3)->get();
                        
                        // Kirim notifikasi hanya jika ada validator yang tersedia
                        if ($validator->isNotEmpty()) {
                            Notification::send($validator, new PelangganRevisiNotification($pelanggan));
                            $alreadyNotified = true; // Setel flag menjadi true setelah notifikasi dikirim
                        }

                        session()->put('bukti_dicek_' . $pelangganId, true);
                    }

                }
            }
        }

      

        return redirect()->route('validator.index')->with('success', 'Status dan catatan berhasil disimpan.');
    }
    
    public function revisiDariPetugas(Request $request,$id) {
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
            'odp_28'=> 'Pengukuran Redaman Power ONT Rx Level mengun    akan
            Ibooster',
      
        ];
    
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggans = $pelanggan->fotos()
        ->where('status_revisi', 'DIKIRIMKAN')
        ->orderBy('updated_at', 'desc')
        ->get();
   
        foreach ($pelanggans as $foto) {
            $foto->time_diff = Carbon::parse($foto->updated_at)->diffForHumans();
            
        }
        
        return view('validator-revisi', compact('pelanggans','areas','odpDescriptions'));
    }

    public function updateRevisi(Request $request, $id) {
        $request->validate([
            'catatan_keseluruhan' => 'required',
            'status_revisi' => 'required'
        ]);

        $statusRevisi = $request->input('status_revisi');
        $catatanKeseluruhan = $request->input('catatan_keseluruhan');
        $alreadyNotified = false; 
        
        foreach ($request->input('status_revisi') as $fotoId => $status) {
            $foto = PelangganFoto::findOrFail($fotoId);
            
            // Periksa apakah status revisi yang dikirimkan berbeda dengan status saat ini
            if ($status !== $foto->status_revisi) {
                $foto->status_revisi = $status;
                $foto->save();

                if ($status === 'NOK' && !$alreadyNotified) {
                    $pelanggan = Pelanggan::findOrFail($foto->pelanggans_id);
                    $validator = User::where('role_id', 3)->get(); 
                    
                    // Kirim notifikasi hanya jika ada validator yang tersedia
                    if ($validator->isNotEmpty()) {
                        Notification::send($validator, new PelangganRevisiNotification($pelanggan));
                        $alreadyNotified = true; // Setel flag menjadi true setelah notifikasi dikirim
                    }
                }
            }
        }

      // Set catatan keseluruhan, status_revisi untuk semua foto yang diperbarui
        PelangganFoto::whereIn('id', array_keys($statusRevisi))
        ->update(['catatan_keseluruhan' => $catatanKeseluruhan]);

    
        return redirect()->route('validator.index')->with('success', 'Revisi berhasil ditambahkan.');
    }
    
}
