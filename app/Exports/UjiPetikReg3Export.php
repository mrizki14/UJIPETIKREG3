<?php

namespace App\Exports;

use App\Models\Pelanggan;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UjiPetikReg3Export implements FromView, WithHeadings
{
    // class UjiPetikReg3Export implements FromQuery, WithHeadings
    use Exportable; 
    
    // protected $month;
    // protected $year;
    // protected $areas;
    // protected $target;
    // protected $hasil;
    // protected $upload;
    // protected $valid;
    
    // public function __construct($month, $year,$areas,$target, $hasil, $upload, $valid)
    // {
    //     $this->month = $month;
    //     $this->year = $year;
    //     $this->areas = $areas;
    //     $this->target = $target;
    //     $this->hasil = $hasil;
    //     $this->upload = $upload;
    //     $this->valid = $valid;
        
    // }
    
    // public function query()
    // {
    //     return Pelanggan::query()
    //         ->select('area')
    //         ->whereYear('pelanggans.created_at', $this->year)
    //         ->whereMonth('pelanggans.created_at', $this->month)
    //         ->selectRaw('COUNT(DISTINCT pelanggans.id) AS total_pelanggan')
    //         ->selectRaw('SUM(CASE WHEN pelanggan_fotos.status = "ok" THEN 1 ELSE 0 END) AS total_ok')
    //         ->selectRaw('SUM(CASE WHEN pelanggan_fotos.status = "nok" THEN 1 ELSE 0 END) AS total_nok')
    //         ->leftJoin('pelanggan_fotos', 'pelanggans.id', '=', 'pelanggan_fotos.pelanggans_id')
    //         ->whereIn('area', array_keys($this->areas))
    //         ->groupBy('area');;
    // }

    // public function headings(): array
    // {
    //     return [
    //         'AREA / WITEL',
    //         'JUMLAH',
    //         'OK',
    //         'NOTOK',
    //         'TARGET',
    //         'HASIL',
    //         'UPLOAD',
    //         'VALID'
    //     ];
    
    // }

    // public function map($result): array
    // {
    //     $areaName = $this->areas[$result->area];
    //     $hasil = $result->total_ok > 0 ? number_format(($result->total_pelanggan / $result->total_ok) * 100, 0) . '%' : '0%';
    //     $upload = number_format($this->calculateUploadPercentage($result), 0) . '%';
    //     $valid = number_format($this->calculateValidPercentage($result), 0) . '%';
    //     $target = 75;
    //     return [
    //         'AREA / WITEL' => $areaName, // Gunakan nama area di sini
    //         'JUMLAH' => $result->total_pelanggan,
    //         'OK' => $result->total_ok,
    //         'NOTOK' => $result->total_nok,
    //         'TARGET' => $target,
    //         'HASIL' => $hasil,
    //         'UPLOAD' => $upload,
    //         'VALID' => $valid,
    //     ];
    // }

    // // Fungsi untuk menghitung persentase UPLOAD
    // private function calculateUploadPercentage($result)
    // {
    //     $totalUpload = $result->total_ok + $result->total_nok;
    //     $target = 75;
    //     return $target > 0 ? ($totalUpload / $target) * 100 : 0;
    // }

    // // Fungsi untuk menghitung persentase VALID
    // private function calculateValidPercentage($result)
    // {
    //     $totalUpload = $result->total_ok + $result->total_nok;
    //     return $result->total_ok > 0 ? ($totalUpload / $result->total_ok) * 100 : 0;
    // }
    protected $month;
    protected $year;
    protected $areas;

    public function __construct($month, $year, $areas)
    {
        $this->month = $month;
        $this->year = $year;
        $this->areas = $areas;
    }

    public function view(): View
    {
        $results = Pelanggan::select('area')
            ->whereYear('pelanggans.created_at', $this->year)
            ->whereMonth('pelanggans.created_at', $this->month)
            ->selectRaw('COUNT(DISTINCT pelanggans.id) AS total_pelanggan')
            ->selectRaw('SUM(CASE WHEN pelanggan_fotos.status = "ok" THEN 1 ELSE 0 END) AS total_ok')
            ->selectRaw('SUM(CASE WHEN pelanggan_fotos.status = "nok" THEN 1 ELSE 0 END) AS total_nok')
            ->leftJoin('pelanggan_fotos', 'pelanggans.id', '=', 'pelanggan_fotos.pelanggans_id')
            ->whereIn('area', array_keys($this->areas))
            ->groupBy('area')
            ->get();

        $finalResults = [];
        foreach ($results as $result) {
            $areaCode = $result->area;
            $areaName = $this->areas[$areaCode];
            $ok = $result->total_ok;
            $nok = $result->total_nok;
            $target = 75;
            $totalUpload = $ok + $nok;
            $hasil = $ok > 0 ? number_format(($result->total_pelanggan / $ok) * 100, 0) . '%' : '0%';
            $upload = $target > 0 ? ($totalUpload / $target) * 100 : 0;
            $valid = $ok > 0 ? ($totalUpload / $ok) * 100 : 0;


            $finalResults[] = [
                'AREA / WITEL' => $areaName,
                'JUMLAH' => $result->total_pelanggan,
                'OK' => $ok,
                'NOTOK' => $nok,
                'TARGET' => $target,
                'HASIL %' => $hasil,
                'UPLOAD %' => round($upload, 0) . '%',
                'VALID %' => round($valid, 0) . '%',
            ];
        }

        return view('export-excel', [
            'finalResults' => $finalResults,
        ]);

        
    }

    public function headings(): array
    {
        return [
            'AREA / WITEL',
            'JUMLAH',
            'OK',
            'NOTOK',
            'TARGET',
            'HASIL %',
            'UPLOAD %',
            'VALID %',
        ];
    }

}
