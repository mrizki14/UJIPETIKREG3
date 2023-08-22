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


        // Dapatkan bulan dan tahun dari tanggal sekarang
        $currentMonth = $currentDate->month;
        $currentYear = $currentDate->year;
        $month = $request->input('month', $currentMonth);
        $year = $request->input('year', $currentYear);
    
        // Lakukan query Eloquent sesuai dengan filter bulan dan tahun yang diterima
        $results = Pelanggan::select('area')
        ->whereYear('pelanggans.created_at', $year) // Tentukan tabel 'created_at' secara eksplisit
        ->whereMonth('pelanggans.created_at', $month) // Tentukan tabel 'created_at' secara eksplisit
        ->selectRaw('COUNT(DISTINCT pelanggans.id) AS total_pelanggan')
        ->selectRaw('SUM(CASE WHEN pelanggan_fotos.status = "ok" THEN 1 ELSE 0 END) AS total_ok')
        ->selectRaw('SUM(CASE WHEN pelanggan_fotos.status = "nok" THEN 1 ELSE 0 END) AS total_nok')
        ->leftJoin('pelanggan_fotos', 'pelanggans.id', '=', 'pelanggan_fotos.pelanggans_id')
        ->whereIn('area', array_keys($this->areas))
        ->groupBy('area')
        ->get();

        if ($results->isEmpty()) {
            return view('dashboard', [
                'months' => $months,
                'years' => $years,
                'areas' => $this->areas,
                'month' => $month,
                'year' => $year,
                'finalResults' => null // Tidak ada data untuk ditampilkan
            ]);
        }
           
        $finalResults = [];
        foreach ($results as $result) {
            $areaCode = $result->area;
            $areaName = $this->areas[$areaCode];
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
            'months' => $months,
            'years' => $years,
            'areas' => $this->areas, 
            'month' => $month,
            'year' => $year,
            'finalResults' => $finalResults
        ]);
        
    }

    public function export(Request $request) {

        $month = $request->input('month');
        $year = $request->input('year');

        return Excel::download(new UjiPetikReg3Export($month, $year, $this->areas), 'uji_petik_reg_3'.'.'.Carbon::now()->format('m-Y').'.xlsx');
    }
}
