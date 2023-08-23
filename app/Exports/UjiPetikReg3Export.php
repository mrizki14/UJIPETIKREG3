<?php

namespace App\Exports;

use App\Models\Pelanggan;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\FromQuery;
use PhpOffice\PhpSpreadsheet\Style\Color;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Borders;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class UjiPetikReg3Export implements FromView, WithHeadings, WithStyles, WithEvents
{

    use Exportable; 

    protected $month;
    protected $year;
    protected $areas;

    public function __construct($month, $year, $areas)
    {
        $this->month = $month;
        $this->year = $year;
        $this->areas = $areas;
    }

    // public function view(): View
    // {
    //     $monthArray = [
    //         1 => 'Januari',
    //         2 => 'Februari',
    //         3 => 'Maret',
    //         4 => 'April',
    //         5 => 'Mei',
    //         6 => 'Juni',
    //         7 => 'Juli',
    //         8 => 'Agustus',
    //         9 => 'September',
    //         10 => 'Oktober',
    //         11 => 'November',
    //         12 => 'Desember',
    //     ];

    //     $results = Pelanggan::select('area')
    //         ->whereYear('pelanggans.created_at', $this->year)
    //         ->whereMonth('pelanggans.created_at', $this->month)
    //         ->selectRaw('COUNT(DISTINCT pelanggans.id) AS total_pelanggan')
    //         ->selectRaw('SUM(CASE WHEN pelanggan_fotos.status = "ok" THEN 1 ELSE 0 END) AS total_ok')
    //         ->selectRaw('SUM(CASE WHEN pelanggan_fotos.status = "nok" THEN 1 ELSE 0 END) AS total_nok')
    //         ->leftJoin('pelanggan_fotos', 'pelanggans.id', '=', 'pelanggan_fotos.pelanggans_id')
    //         ->whereIn('area', array_keys($this->areas))
    //         ->groupBy('area')
    //         ->get();

    //     $finalResults = [];
    //     foreach ($results as $result) {
    //         $areaCode = $result->area;
    //         $areaName = $this->areas[$areaCode];
    //         $ok = $result->total_ok;
    //         $nok = $result->total_nok;
    //         $target = 75;
    //         $totalUpload = $ok + $nok;
    //         $hasil = number_format(($result->total_ok / 75) * 100, 0) . '%';
    //         $upload = $target > 0 ? ($totalUpload / $target) * 100 : 0;
    //         $valid = $ok > 0 ? ($totalUpload / $ok) * 100 : 0;

    //         $finalResults[] = [
    //             'AREA / WITEL' => $areaName,
    //             'JUMLAH' => $result->total_pelanggan,
    //             'OK' => $ok,
    //             'NOTOK' => $nok,
    //             'TARGET' => $target,
    //             'HASIL %' => $hasil,
    //             'UPLOAD %' => round($upload, 0) . '%',
    //             'VALID %' => round($valid, 0) . '%',
    //         ];
    //     }


    //     return view('export-excel', [
    //         'finalResults' => $finalResults,
    //         'month' => $monthArray[$this->month],
    //         'year' => $this->year,
         
    //     ]);

        
    // }

    public function view(): View
    {
        $monthArray = [
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
            12 => 'Desember',
        ];
    
        // Inisialisasi hasil akhir dengan data wilayah default
        $finalResults = collect($this->areas)->map(function ($areaName, $areaCode) {
            return (object)[
                'area_code' => $areaCode,
                'area_name' => $areaName,
                'total_pelanggan' => 0,
                'total_ok' => 0,
                'target' => 75,
                'total_nok' => 0,
                'upload_percentage' => 0,
                'valid_percentage' => 0,
            ];
        });
    
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
    
        foreach ($results as $result) {
            $areaCode = $result->area;
            $areaName = $this->areas[$areaCode];
            $ok = $result->total_ok;
            $nok = $result->total_nok;
    
            // Perbarui hasil akhir untuk wilayah yang sesuai
            $finalResults[$areaCode]->total_pelanggan += $result->total_pelanggan;
            $finalResults[$areaCode]->total_ok += $ok;
            $finalResults[$areaCode]->total_nok += $nok;
    
            // Perhitungan upload_percentage dan valid_percentage
            $target = 75;
            $totalUpload = $ok + $nok;
            $uploadPercentage = $target > 0 ? ($totalUpload / $target) * 100 : 0;
            $validPercentage = $ok > 0 ? ($totalUpload / $ok) * 100 : 0;
    
            // Update hasil akhir untuk upload_percentage dan valid_percentage
            $finalResults[$areaCode]->upload_percentage += $uploadPercentage;
            $finalResults[$areaCode]->valid_percentage += $validPercentage;
        }
    
        // Pastikan nilai upload_percentage dan valid_percentage dihitung dengan benar untuk semua wilayah
        foreach ($finalResults as $result) {
            $result->upload_percentage = count($results) > 0 ? $result->upload_percentage / count($results) : 0;
            $result->valid_percentage = count($results) > 0 ? $result->valid_percentage / count($results) : 0;
        }
    
        return view('export-excel', [
            'finalResults' => $finalResults->values()->toArray(), // Menggunakan ->values() untuk menghilangkan kunci wilayah
            'month' => $monthArray[$this->month],
            'year' => $this->year,
        ]);
    }
    

    public function headings(): array
    {
        return [
            [
                'UJI PETIK REGIONAL 3', 
    
            ],
            [''],
            [''],
            [
                'AREA / WITEL',
                'JUMLAH',
                'OK',
                'NOTOK',
                'TARGET',
                'HASIL %',
                'UPLOAD %',
                'VALID %',
            ],
        ];
    }

    public function styles(Worksheet $sheet) {
        $styles = [
            'A1:H1' => ['font' => ['bold' => true], 'alignment' => ['horizontal' => 'center']],
            'A' => ['alignment' => ['horizontal' => 'center']],
        ];

        $sheet->getStyle('A1:H1')->applyFromArray($styles['A1:H1']);
        $sheet->getStyle('A')->applyFromArray($styles['A']);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Mendapatkan objek sheet aktif
                $sheet = $event->sheet;

                // Pindahkan teks "UJI PETIK REGIONAL 3" ke baris pertama dan kedua
                $sheet->setCellValue('A1', 'UJI PETIK REGIONAL 3');
                $sheet->setCellValue('A2', 'UJI PETIK REGIONAL 3');
                $sheet->getStyle('A1:A2')->getAlignment()->setVertical('center');
                // Mengosongkan baris ketiga
                $sheet->setCellValue('A3', '');
                $sheet->setCellValue('B3', '');
                $sheet->setCellValue('C3', '');
                $sheet->setCellValue('D3', '');
                $sheet->setCellValue('E3', '');
                $sheet->setCellValue('F3', '');
                $sheet->setCellValue('G3', '');

                // $sheet->setCellValue('D4', $this->month);
                // $sheet->setCellValue('E4', $this->year);
    
                $sheet->getStyle('A7:A8')->getFill()->setFillType(Fill::FILL_SOLID);
                $sheet->getStyle('A7:A8')->getFill()->getStartColor()->setARGB('FF8DB4E2');
                $sheet->getStyle('D7:H7')->getFill()->setFillType(Fill::FILL_SOLID);
                $sheet->getStyle('D7:H7')->getFill()->getStartColor()->setARGB('FF8DB4E2');
                $sheet->getStyle('D8:H8')->getFill()->setFillType(Fill::FILL_SOLID);
                $sheet->getStyle('D8:H8')->getFill()->getStartColor()->setARGB('FF8DB4E2');
                $sheet->getStyle('I7:J7')->getFill()->setFillType(Fill::FILL_SOLID);
                $sheet->getStyle('I7:J7')->getFill()->getStartColor()->setARGB('FF8DB4E2');
                $sheet->getStyle('I8:J8')->getFill()->setFillType(Fill::FILL_SOLID);
                $sheet->getStyle('I8:J8')->getFill()->getStartColor()->setARGB('FF8DB4E2');
                
                $sheet->getStyle('A9:A14')->getFill()->setFillType(Fill::FILL_SOLID);
                $sheet->getStyle('A9:A14')->getFill()->getStartColor()->setARGB('FFFFFFCC');
                $sheet->getStyle('D4:E4')->getFill()->setFillType(Fill::FILL_SOLID);
                $sheet->getStyle('D4:E4')->getFill()->getStartColor()->setARGB('FFFFFFCC');


                $sheet->getStyle('D9:D14')->getFill()->setFillType(Fill::FILL_SOLID);
                $sheet->getStyle('D9:D14')->getFill()->getStartColor()->setARGB('FFC0C0C0');


                $sheet->getStyle('E9:E14')->getFill()->setFillType(Fill::FILL_SOLID);
                $sheet->getStyle('E9:E14')->getFill()->getStartColor()->setARGB('00FA9A');

                $sheet->getStyle('F9:F14')->getFill()->setFillType(Fill::FILL_SOLID);
                $sheet->getStyle('F9:F14')->getFill()->getStartColor()->setARGB('FFFF99B4');

                $sheet->getStyle('G9:G14')->getFill()->setFillType(Fill::FILL_SOLID);
                $sheet->getStyle('G9:G14')->getFill()->getStartColor()->setARGB('FFFFE699');

                $sheet->getStyle('H9:H14')->getFill()->setFillType(Fill::FILL_SOLID);
                $sheet->getStyle('H9:H14')->getFill()->getStartColor()->setARGB('90EE90');

                $sheet->getStyle('I9:I14')->getFill()->setFillType(Fill::FILL_SOLID);
                $sheet->getStyle('I9:I14')->getFill()->getStartColor()->setARGB('00CD00');

                $sheet->getStyle('J9:J14')->getFill()->setFillType(Fill::FILL_SOLID);
                $sheet->getStyle('J9:J14')->getFill()->getStartColor()->setARGB('00CD00');
            
                $sheet->setCellValue('D4', strtoupper($sheet->getCell('D4')->getValue()));
                
                $sheet->getStyle('D4')->getBorders()->getRight()->setBorderStyle('none');
                $sheet->getStyle('D5')->getAlignment()->setVertical('center');
                $sheet->setCellValue('A7','AREA / WITEL');
                $sheet->setCellValue('A8','AREA / WITEL');
                $sheet->getStyle('A7:A8')->getAlignment()->setVertical('center');
                $sheet->getStyle('D7:H7')->getAlignment()->setHorizontal('center');

                $sheet->setCellValue('I7','UPLOAD %');
                $sheet->setCellValue('I8','UPLOAD %');
                $sheet->getStyle('I7:I8')->getAlignment()->setVertical('center');
                $sheet->getStyle('I7:I8')->getAlignment()->setHorizontal('center');
                $sheet->setCellValue('J7','VALID %');
                $sheet->setCellValue('J8','VALID %');
                $sheet->getStyle('J7:J8')->getAlignment()->setVertical('center');
                $sheet->getStyle('J7:J8')->getAlignment()->setHorizontal('center');
                
                $sheet->getStyle('A7:J7')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $sheet->getStyle('D8:J8')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $sheet->getStyle('D8:H8')->getAlignment()->setHorizontal('center');
                $sheet->getStyle('A9:J9')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $sheet->getStyle('D9:J9')->getAlignment()->setHorizontal('center');

                $sheet->getStyle('A9:A14')->getAlignment()->setHorizontal('left');
                $sheet->getStyle('A10:J10')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $sheet->getStyle('D10:J10')->getAlignment()->setHorizontal('center');
                $sheet->getStyle('A11:J11')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $sheet->getStyle('D11:J11')->getAlignment()->setHorizontal('center');
                $sheet->getStyle('A12:J12')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $sheet->getStyle('D12:J12')->getAlignment()->setHorizontal('center');
                $sheet->getStyle('A13:J13')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $sheet->getStyle('D13:J13')->getAlignment()->setHorizontal('center');
                $sheet->getStyle('A14:J14')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $sheet->getStyle('D14:J14')->getAlignment()->setHorizontal('center');

                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(12);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(12);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(12);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(12);
                $event->sheet->getDelegate()->getColumnDimension('H')->setWidth(12);
                $event->sheet->getDelegate()->getColumnDimension('I')->setWidth(12);
                $event->sheet->getDelegate()->getColumnDimension('J')->setWidth(12);

                $event->sheet->getDelegate()->getStyle('I9:I14')->getFont()->getColor()->setARGB('FFFFFFFF');
                $event->sheet->getDelegate()->getStyle('J9:J14')->getFont()->getColor()->setARGB('FFFFFFFF');

            },
        ];
    }

}
