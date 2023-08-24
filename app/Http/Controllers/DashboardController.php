<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Models\PelangganFoto;
use Illuminate\Support\Collection;
use App\Exports\UjiPetikReg3Export;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    protected $areas;

    public function __construct()
    {
        $this->areas = [
            "BDG" => 'BANDUNG',
            "BGB" => 'BANDUNG BARAT',
            "CRB" => 'CIREBON',
            "KRW" => 'KARAWANG',
            "SKB" => 'SUKABUMI',
            "TSM" => 'TASIKMALAYA'
        ];
    }

    public function index(Request $request) {
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
    
        $currentDate = Carbon::now();
        $currentMonth = $currentDate->month;
        $currentYear = $currentDate->year;
        $month = $request->input('month', $currentMonth);
        $year = $request->input('year', $currentYear);
        // $today = Carbon::now()->format('Y-m-d');
       
        // Periksa jika ada data untuk hari ini, jika tidak, set $todayResults menjadi array kosong.
        $todayResults = Pelanggan::select('area')
        ->whereDate('pelanggans.created_at', Carbon::today())
        ->selectRaw('COUNT(DISTINCT pelanggans.id) AS total_pelanggan')
        ->selectRaw('SUM(CASE WHEN pelanggan_fotos.status = "ok" THEN 1 ELSE 0 END) AS total_ok')
        ->selectRaw('SUM(CASE WHEN pelanggan_fotos.status = "nok" THEN 1 ELSE 0 END) AS total_nok')
        ->leftJoin('pelanggan_fotos', 'pelanggans.id', '=', 'pelanggan_fotos.pelanggans_id')
        ->whereIn('area', array_keys($this->areas))
        ->groupBy('area')
        ->get();

        // Jika tidak ada data untuk hari ini, buat hasil data kosong.
        if ($todayResults->isEmpty()) {
        $todayResults = collect($this->areas)->map(function($areaName, $areaCode) {
            return [
                'area' => $areaCode,
                'area_name' => $areaName,
                'total_pelanggan' => 0,
                'total_ok' => 0,
                'total_nok' => 0,
                'upload_percentage' => 0,
                'valid_percentage' => 0,
            ];
        });
        }

        if ($request->has('month') && $request->has('year')) {
            $results = Pelanggan::select('area')
                ->whereYear('pelanggans.created_at', $year)
                ->whereMonth('pelanggans.created_at', $month)
                ->selectRaw('COUNT(DISTINCT pelanggans.id) AS total_pelanggan')
                ->selectRaw('SUM(CASE WHEN pelanggan_fotos.status = "ok" THEN 1 ELSE 0 END) AS total_ok')
                ->selectRaw('SUM(CASE WHEN pelanggan_fotos.status = "nok" THEN 1 ELSE 0 END) AS total_nok')
                ->leftJoin('pelanggan_fotos', 'pelanggans.id', '=', 'pelanggan_fotos.pelanggans_id')
                ->whereIn('area', array_keys($this->areas))
                ->groupBy('area')
                ->get();

                if ($results->isEmpty()) {
                    $results = collect($this->areas)->map(function ($areaName, $areaCode) {
                        return [
                            'area' => $areaCode,
                            'area_name' => $areaName,
                            'total_pelanggan' => 0,
                            'total_ok' => 0,
                            'total_nok' => 0,
                            'upload_percentage' => 0,
                            'valid_percentage' => 0,
                        ];
                    });
                }
        }else {
            // No filter applied, use the data for today
            $results = $todayResults;
        }
            
        $finalResults = collect($this->areas)->map(function($areaName, $areaCode) {
            return [
                'area_code' => $areaCode,
                'area_name' => $areaName,
                'total_pelanggan' => 0,
                'total_ok' => 0,
                'total_nok' => 0,
                'upload_percentage' => 0,
                'valid_percentage' => 0,
            ];
        })->toArray();


        foreach ($results as $result) {
            $areaCode = $result['area'];
            $ok = $result['total_ok'];
            $nok = $result['total_nok']; 

            // Perbarui hasil akhir untuk wilayah yang sesuai
            $finalResults[$areaCode]['total_pelanggan'] += $result['total_pelanggan'];
            $finalResults[$areaCode]['total_ok'] += $ok;
            $finalResults[$areaCode]['total_nok'] += $nok;

            // Perhitungan upload_percentage dan valid_percentage
            $target = 75;
            $totalUpload = $ok + $nok;
            $uploadPercentage = $target > 0 ? ($totalUpload / $target) * 100 : 0;
            $validPercentage = $ok > 0 ? ($totalUpload / $ok) * 100 : 0;

            // Update hasil akhir untuk upload_percentage dan valid_percentage
            $finalResults[$areaCode]['upload_percentage'] += $uploadPercentage;
            $finalResults[$areaCode]['valid_percentage'] += $validPercentage;
        }
        foreach ($finalResults as &$result) {
            $result['upload_percentage'] = count($results) > 0 ? $result['upload_percentage'] / count($results) : 0;
            $result['valid_percentage'] = count($results) > 0 ? $result['valid_percentage'] / count($results) : 0;
        }

        $finalResults = array_values($finalResults);
            
        return view('dashboard', [
            'months' => $months,
            'years' => $years,
            'areas' => $this->areas, 
            'month' => $month,
            'year' => $year,
            'finalResults' => $finalResults,
            'todayResults' => $todayResults,
            // 'combinedResults' => $combinedResults,
        ]);
        
    }
    
    
    
    

    public function export(Request $request) {

        $month = $request->input('month');
        $year = $request->input('year');

        return Excel::download(new UjiPetikReg3Export($month, $year, $this->areas), 'uji_petik_reg_3'.'.'.Carbon::now()->format('m-Y').'.xlsx');
    }
}