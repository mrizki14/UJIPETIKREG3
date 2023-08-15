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
        // $pelanggansFoto = PelangganFoto::findOrFail($id);
        // $pelanggans = Pelanggan::get();
        $cekBukti = PelangganFoto::where('pelanggans_id', $id)->count();

        if ($cekBukti < 28) {
            return redirect()->route('validator.index')->with('errors', 'Bukti kurang cukup.');
        }
            $pelanggansFoto = PelangganFoto::with('pelanggan')
            ->where('pelanggans_id', $id)
            ->orderBy('file','asc')
            ->get()
            ->groupBy('pelanggans_id')
            ->values();
            // dd($pelanggansFoto);
            // dd($pelanggansFoto);
            // ->map(function ($group) {
            //     return $group->first();
        
            // });

            // $pelanggansFoto = PelangganFoto::with('pelanggan')
            
            // ->get();
            return view('validator-detail', compact('pelanggansFoto','areas'));
 

        // $pelanggansFoto = Pelanggan::has('fotos')
        // ->with('fotos')
        // ->get();
        // dd($pelanggansFoto);
        // return view('validator-detail', compact('pelanggansFoto','areas'));
    }
}
