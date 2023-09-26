<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Illuminate\Support\Collection;
use Auth;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Events\BeforeSheet;

class CropExport implements FromCollection, WithHeadings, ShouldAutoSize, 
WithStyles, WithHeadingRow, WithStartRow, WithCustomStartCell, WithEvents
{
    protected $cropQuery, $cropsBrgy, $crop_fdate, $crop_sdate, $fdate, $sdate;
    use Exportable;

    public function __construct(Collection $cropQuery, $cropsBrgy, $crop_fdate = null, $crop_sdate = null, $fdate = null, $sdate = null)
    {
        $this->cropQuery = $cropQuery;
        $this->cropsBrgy = $cropsBrgy;
        $this->fdate = $fdate;
        $this->sdate = $sdate;
        $this->crop_fdate = $crop_fdate;
        $this->crop_sdate = $crop_sdate;
    }
    public function startCell(): string
    {
        return 'A5';
    }
    public function headingRow(): int
    {
        return 1;
    }
    public function startRow(): int
    {
        return 3;
    }

    public function collection()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            $query = $this->cropQuery;

            if (!is_null($this->fdate) && !is_null($this->sdate)) {
                $query->whereBetween('crops.created_at', [$this->fdate, $this->sdate]);
            }
            
            return $query;
        } else {
            $query = $this->cropsBrgy;

            if (!is_null($this->crop_fdate) && !is_null($this->crop_sdate)) {
                $query->whereBetween('crops.created_at', [$this->crop_fdate, $this->crop_sdate]);
            }
            return $query;
        }
    }

    public function styles(Worksheet $sheet)
    {
        return [
            5 => [
                'font' => [
                    'bold' => true,
                    'size' => 12,
                ],
                'borders' => ['allBorders' => ['borderStyle' => 'thin']],
            ],
            6 => ['borders' => ['allBorders' => ['borderStyle' => 'thin']]],
            7 => ['borders' => ['allBorders' => ['borderStyle' => 'thin']]],
        ];
    }

  
    public function registerEvents(): array
    {
        $fdate = $this->fdate;
        $sdate = $this->sdate;
        $crop_fdate = $this->crop_fdate;
        $crop_sdate = $this->crop_sdate;
        return [
            AfterSheet::class => function (AfterSheet $event) use ($fdate, $sdate, $crop_fdate, $crop_sdate) {
                $sheet = $event->sheet;
                $today = date('F j, Y');
                // Title
                $sheet->mergeCells('A1:M1');
                $sheet->setCellValue('A1', 'Province of Sorsogon');
                $sheet->getStyle('A1:M1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('A1')->getFont()->setSize(14);
                $sheet->mergeCells('A2:M2');
                $sheet->setCellValue('A2', 'HVCDP PRODUCTION DATA');
                $sheet->getStyle('A2:M2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('A2')->getFont()->setSize(14);

                if (Auth::check() && Auth::user()->role === 'admin') {
                    if (!is_null($this->fdate) && !is_null($this->sdate)) {
                        $sheet->mergeCells('A3:M3');
                        $sheet->setCellValue('A3', date('F j, Y', strtotime($fdate)) . '  to  ' . date('F j, Y', strtotime($sdate)));
                        $sheet->getStyle('A3:M3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                        $sheet->getStyle('A3')->getFont()->setSize(14);
                    }else{
                        $sheet->mergeCells('A3:M3');
                        $sheet->setCellValue('A3', $today);
                        $sheet->getStyle('A3:M3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                        $sheet->getStyle('A3')->getFont()->setSize(14);
                    }
                } else {
                    if (!is_null($this->crop_fdate) && !is_null($this->crop_sdate)) {
                        $sheet->mergeCells('A3:M3');
                        $sheet->setCellValue('A3', date('F j, Y', strtotime($crop_fdate)) . '  to  ' . date('F j, Y', strtotime($crop_sdate)));
                        $sheet->getStyle('A3:M3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                        $sheet->getStyle('A3')->getFont()->setSize(14);
                    }else{
                        $sheet->mergeCells('A3:M3');
                        $sheet->setCellValue('A3', $today);
                        $sheet->getStyle('A3:M3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                        $sheet->getStyle('A3')->getFont()->setSize(14);
                    }
                }

                // $sheet->mergeCells('A4:B4');
                $sheet->setCellValue('A4', 'Masterlist of Farmers');
                $sheet->getStyle('A4')->getFont()->setBold(true);
                $sheet->getStyle('A4')->getFont()->setSize(12);
                $sheet->getStyle('A4:A4')->getBorders()->getOutline()->setBorderStyle('thin');

                $sheet->mergeCells('B4:M4');
                $sheet->setCellValue('B4', 'Crops Area/ sq/ mtr');
                $sheet->getStyle('B4:M4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('B4')->getFont()->setBold(true);
                $sheet->getStyle('B4')->getFont()->setSize(12);
                $sheet->getStyle('B4:M4')->getBorders()->getOutline()->setBorderStyle('thin');

                

                // Add custom data and apply formatting

                // for ($i = 1; $i <= count($this->cropQuery); $i++) {
                //     // $customData = $this->cropQuery[$i - 1];
                //     // $sheet->setCellValue('A' . ($i + $customDataRowStart), $customData->brgy_name);
                //     $sheet->getStyle('A' . ($i + $customDataRowStart))->getAlignment()
                //         ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                //     $sheet->getStyle('D' . ($i + $customDataRowStart))->getAlignment()
                //         ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                //     $sheet->getStyle('F' . ($i + $customDataRowStart))->getAlignment()
                //         ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                // }
                if(Auth::check() && Auth::user()->role === 'admin'){
                    $cropQueryDataRowStart = $this->startRow() + count($this->cropQuery) + 1;
                    $sheet->getDelegate()->getStyle('A6:M'. $cropQueryDataRowStart + 1)->applyFromArray([
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '000000'],
                            ],
                        ],
                    ]);

                }else{
                    $cropBrgyDataRowStart = $this->startRow() + count($this->cropsBrgy) + 1;
                    $sheet->getDelegate()->getStyle('A6:M'. $cropBrgyDataRowStart + 1)->applyFromArray([
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '000000'],
                            ],
                        ],
                    ]);
                }

            },
        ];
    }

    public function headings(): array
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return [
                'Barangay',
                'Talong',
                'Balatong',
                'Okra',
                'Upo',
                'Sili',
                'Ampalaya',
                'Pechay',
                'Pipino',
                'Patola',
                'Tomato',
                'Kalabasa',
                'Mango',
            ];
        } else {
            return [
                'Name of Farmer',
                'Talong',
                'Balatong',
                'Okra',
                'Upo',
                'Sili',
                'Ampalaya',
                'Pechay',
                'Pipino',
                'Patola',
                'Tomato',
                'Kalabasa',
                'Mango',
            ];
        }
    }
}
