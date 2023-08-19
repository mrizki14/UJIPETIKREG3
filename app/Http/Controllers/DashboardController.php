<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Models\PelangganFoto;

class DashboardController extends Controller
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
            2015 => 2015,
            2016 => 2016,
            2017 => 2017,
            2018 => 2018,
            2019 => 2019,
            2020 => 2020,
            2021 => 2021,
            2022 => 2022,
            2023 => 2023,
            2024 => 2024,
            2025 => 2025,
        ];
        
        // $currentTime = now(); 
        // $fifeteenMinutesAgo = now()->subMinutes(15);

        // $today = Carbon::now()->isoFormat('D MMMM Y');
        // new Carbon();
        // $timestemp = "2023-01-01 01:02:03";
        // $year = Carbon::createFromFormat('Y-m-d H:i:s', $timestemp)->year;
        // if (isset($_GET['month'])) {
        //     $month = $_GET['month'];
        //     $pelanggans = Pelanggan::whereMonth('created_at', $month)
        //         ->get();
        // }

        // if (isset($_GET['year'])) {
        //     $year = $_GET['year']; // The year you want to filter by
        //     $pelanggans = Pelanggan::whereYear('created_at', $year)->get();
        // }

        // if (isset($_GET['month']) && isset($_GET['year'])) {
        //     $month = $_GET['month'];
        //     $year = $_GET['year']; // The year you want to filter by
        //     $pelanggans = Pelanggan::whereMonth('created_at', $month)
        //         ->whereYear('created_at', $year)
        //         ->get();
        // }
        // if (!isset($_GET['month']) && !isset($_GET['year'])) {
        //     $pelanggans = Pelanggan::
        //         whereDate('created_at', $currentTime->toDateString())
        //         ->whereTime('created_at', '>=', $fifeteenMinutesAgo->toTimeString())
        //         ->get();
        // }

        // $areaStatusCounts = PelangganFoto::select('pelanggans.area', 'pelanggan_fotos.status', DB::raw('COUNT(*) as count'))
        // ->join('pelanggans', 'pelanggan_fotos.pelanggans_id', '=', 'pelanggans.id')
        // ->whereIn('pelanggan_fotos.status', ['OK', 'NOK'])
        // ->groupBy('pelanggans.area', 'pelanggan_fotos.status')
        // ->get();

        // $month = Carbon::now()->month; // Ganti dengan bulan yang ingin Anda hitung
        // $year = Carbon::now()->year;   // Ganti dengan tahun yang ingin Anda hitung

        // $pelanggans = Pelanggan::whereMonth('created_at', $month)
        // ->whereYear('created_at', $year)
        // ->get();

        // $statusCounts = PelangganFoto::with('pelanggan')
        // ->select('pelanggans_id', 'status')
        // ->selectRaw('COUNT(*) as count')
        // ->groupBy('pelanggans_id', 'status')
        // ->get()
        // ->groupBy('pelanggan.area', 'status')
        // ->map(function ($group) {
        //     return $group->sum('count');
        // });
        
        // $statusTarget = [];
        // foreach ($areas as $areaKey => $areaName) {
        //     $statusTarget[$areaKey] = $statusCounts[$areaKey]['jumlah'] ?? 0;
        // }
        $results = Pelanggan::select('area')
        ->selectRaw('COUNT(DISTINCT pelanggans.id) AS total_pelanggan')
        ->selectRaw('SUM(CASE WHEN pelanggan_fotos.status = "ok" THEN 1 ELSE 0 END) AS total_ok')
        ->selectRaw('SUM(CASE WHEN pelanggan_fotos.status = "nok" THEN 1 ELSE 0 END) AS total_nok')
        ->leftJoin('pelanggan_fotos', 'pelanggans.id', '=', 'pelanggan_fotos.pelanggans_id')
        ->whereIn('area', array_keys($areas))
        ->groupBy('area')
        ->get();

   
        $finalResults = [];
        foreach ($results as $result) {
            $areaCode = $result->area;
            $areaName = $areas[$areaCode];
            $ok = $result->total_ok;
            $nok = $result->total_nok;
            $target = 75;
            $totalUpload = $ok + $nok;// Jumlah OK dan NOK
            $uploadPercentage = $target > 0 ? ($totalUpload / $target) * 100 : 0; // UPLOAD % (OK + NOK : Target)
            $validPercentage = $ok > 0 ? ($totalUpload / $ok) * 100 : 0;

            $finalResults[] = [
                'area_code' => $areaCode,
                'area_name' => $areaName,
                'total_pelanggan' => $result->total_pelanggan,
                'total_ok' => $ok,
                'total_nok' => $nok,
                'upload_percentage' => $uploadPercentage,
                'valid_percentage' => $validPercentage,
            ];
        }


      
        return view('dashboard', [
            // 'areas' => $areas,
            // 'pelanggans' => $pelanggans,
            // 'today' => $today,
            // 'year' => $year,
            // 'months' => $months,
            // 'years' => $years,
            // 'statusCounts' => $statusCounts,
            // 'statusTarget' => $statusTarget,
            // 'areaStatusCounts' => $areaStatusCounts
            'finalResults' => $finalResults
        ]);

    }
}
