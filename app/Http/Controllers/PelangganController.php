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
    public function index(Request $request) {
        $areas = [
            "BDG" => 'BANDUNG',
            "BGB" => 'BANDUNG BARAT',
            "CRB" => 'CIREBON',
            "KRW" => 'KARAWANG',
            "SKB" => 'SUKABUMI',
            "TSM" => 'TASIKMALAYA'
        ];

        $months = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        $years = [
            2022 => 2022,
            2023 => 2023,
            2024 => 2024,
            2025 => 2025,
        ];  

              // Dapatkan bulan dan tahun saat ini
        $currentMonth = date('n');
        $currentYear = date('Y');

        // Inisialisasi filter bulan dan tahun yang dipilih
        $selectedMonth = $request->input('month', $currentMonth);
        $selectedYear = $request->input('year', $currentYear);

        // Query untuk mendapatkan data pelanggan berdasarkan bulan dan tahun yang dipilih
        $pelanggans = Pelanggan::with('fotos')
            ->whereMonth('created_at', $selectedMonth)
            ->whereYear('created_at', $selectedYear)
            ->get();

     
        return view('pelanggan', [
            "areas" => $areas,
            "pelanggans" => $pelanggans,
            "months" => $months,
            "years" => $years,
            "selectedMonth" => $selectedMonth,
            "selectedYear" => $selectedYear,
            // "filteredData" => $filteredData,
            
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
