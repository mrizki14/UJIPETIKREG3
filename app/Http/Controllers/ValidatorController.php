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

        $pelangganFoto = Pelanggan::has('fotos')
        ->with(['fotos' => function ($query) {
            $query->select('pelanggans_id', 'file', 'catatan');
        }])
        ->get();
     
        return view('validator', compact('pelangganFoto', 'areas'));
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

            // $cekBukti = PelangganFoto::where('pelanggans_id', $id)->count();

            // if ($cekBukti < 28) {
            //     return redirect()->route('validator.index')->with('errors', 'Bukti kurang cukup petugas harus mengisi semua intruksi.');
            // }
            $pelanggansFoto = PelangganFoto::with('pelanggan')
            ->where('pelanggans_id', $id)
            ->orderBy('file','asc')
            ->get()
            ->groupBy('pelanggans_id')
            ->values();
            
            $revisiData = [];
            foreach ($pelanggansFoto as $collection) {
                foreach ($collection as $foto) {
                    $revisiData[] = [
                        'pelanggan' => $foto->pelanggan, // Dapatkan objek Pelanggan
                        'foto' => $foto, // Dapatkan objek PelangganFoto
                        'selisih_waktu' => Carbon::parse($foto->updated_at)->diffForHumans(),
                    ];
                }
            }

            // foreach ($pelanggansFoto as $foto) {
            //     $foto->time_diff = Carbon::parse($foto->created_at)->diffForHumans();
            // }
            
            // $revisiData = [];
            // foreach ($pelanggansFoto as $pelanggan) {
            //     foreach ($pelanggan as $foto) {
            //         $selisihWaktu = Carbon::parse($foto->created_at)->diffForHumans();
                    
            //         $revisiData[] = [
            //             'selisih_waktu' => $selisihWaktu,
            //             'catatan' => $foto->input_catatan,
            //         ];
            //     }
            // }
            return view('validator-detail', compact('pelanggansFoto','areas','revisiData'));
    }

    public function update(Request $request,$id) {

        $request->validate([
            'status' => 'required|array',
            'catatan_keseluruhan' => 'nullable|string',

        ]);
        // $statusData = $request->input('status');
        // $catatan = $request->input('catatan_keseluruhan');

        // foreach ($statusData as $pelanggansId => $status) {
            
        //     PelangganFoto::where('pelanggans_id', $pelanggansId)
        //         ->update(['status' => $status, 'catatan_keseluruhan' => $catatan]);
        // }
         $statusValues = $request->input('status');
         $catatanKeseluruhan = $request->input('catatan_keseluruhan');
    
        foreach ($statusValues as $pelangganId => $statusArray) {
            foreach ($statusArray as $odp => $status) {
                $foto = PelangganFoto::where('pelanggans_id', $pelangganId)
                    ->where('odp', $odp)
                    ->first();
                if ($foto) {
                    $foto->status = $status;
                    $foto->catatan_keseluruhan = $catatanKeseluruhan; 
                    $foto->save();

                    if ($status === 'NOK') {
                        $pelanggan = Pelanggan::findOrFail($pelangganId);
                        $validator = User::where('role_id', 3)->get();
                        Notification::send($validator, new PelangganRevisiNotification($pelanggan));
                    }
                }
            }
        }
      
        return redirect()->route('validator.index')->with('success', 'Status dan catatan berhasil disimpan.');
    }
    
    public function revisiDariPetugas() {
        echo "ini halaman revisi dari petugas";
    }
}
