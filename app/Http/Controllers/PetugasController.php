<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Models\PelangganFoto;
use Illuminate\Support\Facades\Validator;

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
        $pelanggans = Pelanggan::with('fotos:id,pelanggans_id')->get();
        return view('petugas', compact('pelanggans', 'areas' ));
    }

    public function petugasDetail($id) {
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
        $checklistOdp = [1=>"Konektor dan Adapter tipe SC-UPC",2=>"Instalasi kabel, pastikan rapi (tidak ada bending)"];
        return view('petugas-detail',[
        'pelanggans' => $pelanggans, 
        'areas' => $areas,
        'images' => $images,
        'checklistOdp' => $checklistOdp
        
        ]);
       
    }
    public function store(Request $request, $pelanggans_id) {
       
        $validator = Validator::make($request->all(),[
            "file" => "required|image|mimes:jpeg,png,jpg",
            "catatan" => "required",
            "odp_id" => "nullable",
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
        $file_name = time() . '_' . $file->getClientOriginalName();
        $foto = new PelangganFoto([
            'file' => $file_name,
            'catatan' => $request->catatan,
            'odp_id' => $request->odp_id,
            'pelanggans_id' => $input
            
        ]);

        $file->storeAs('public/images', $file_name);
        $pelanggan->fotos()->save($foto);
  
        // session()->put('form_completed', true);

        return redirect()->back()->with('success', 'Foto berhasil diunggah.');
    }
}
