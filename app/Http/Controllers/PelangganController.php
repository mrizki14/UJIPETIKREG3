<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PelangganCreatedNotification;
use Illuminate\Notifications\Events\NotificationSent;

class PelangganController extends Controller
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

        $pelanggans = Pelanggan::all();
        return view('pelanggan', [
            "areas" => $areas,
            "pelanggans" => $pelanggans,
        ]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            "area" => 'required',
            "nama" => 'required',
            "kontak" => 'required',
            "location" => 'required',
            "odp_loc" => 'required',
            "number" => "nullable"
        ]);

        if ($validator->fails()) {
            return redirect()->route('pelanggan.index')
                ->withErrors($validator)
                ->withInput();
            // dd('ada kesalahan');
        }
        $input = $request->all();
        DB::beginTransaction();
        try {
            $pelanggan = Pelanggan::create($input);
            $petugas = User::where('role_id', 3)->get();
            Notification::send($petugas, new PelangganCreatedNotification($pelanggan));
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('errors', $th->getMessage());
        }


        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan');
    }
}
