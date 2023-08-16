<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Models\PelangganFoto;
use Illuminate\Database\QueryException;

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

    public function validatorDetail($id) {
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
        //     return redirect()->route('validator.index')->with('errors', 'Bukti kurang cukup.');
        // }
            $pelanggansFoto = PelangganFoto::with('pelanggan')
            ->where('pelanggans_id', $id)
            ->orderBy('file','asc')
            ->get()
            ->groupBy('pelanggans_id')
            ->values();
            return view('validator-detail', compact('pelanggansFoto','areas'));
    }

    public function update(Request $request,$id) {

        $request->validate([
            'status' => 'required|array',
            'catatan_keseluruhan' => 'nullable|string',
            // tambahkan validasi lain sesuai kebutuhan
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
                    $foto->catatan_keseluruhan = $catatanKeseluruhan; // set catatan keseluruhan
                    $foto->save();
                  
                }
            }
            }
        return redirect()->route('validator.index')->with('success', 'Status dan catatan berhasil disimpan.');
    }
    
}
