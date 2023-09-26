<?php

namespace App\Exports;

use App\Models\Livestock;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Collection;
use Auth;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;

class LivestockExport implements WithHeadings, ShouldAutoSize, FromCollection, 
WithStyles, WithHeadingRow, WithStartRow, WithCustomStartCell, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */ 
    protected $livestockQuery, $livestockBrgy, $fdate, $sdate, $livestock_fdate, $livestock_sdate;
    use Exportable;
    
    public function __construct(Collection $livestockQuery, $livestockBrgy, $fdate = null, $sdate = null,$livestock_fdate = null, $livestock_sdate = null)
    {
        $this->livestockQuery = $livestockQuery;
        $this->livestockBrgy = $livestockBrgy;
        $this->fdate = $fdate;
        $this->sdate = $sdate;
        $this->livestock_fdate = $livestock_fdate;
        $this->livestock_sdate = $livestock_sdate;

    }
    public function startCell(): string
    {
        return 'A6';
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
            $query = $this->livestockQuery;

            if (!is_null($this->fdate) && !is_null($this->sdate)) {
                $query->whereBetween('livestocks.created_at', [$this->fdate, $this->sdate]);
            }
            
            return $query;
        } else {
            $query = $this->livestockBrgy;

            if (!is_null($this->livestock_fdate) && !is_null($this->livestock_sdate)) {
                $query->whereBetween('livestocks.created_at', [$this->livestock_fdate, $this->livestock_sdate]);
            }
            return $query;
        }
        
    }

    public function styles(Worksheet $sheet)
    {
        return [
            6 => [
                'font' => [
                    'bold' => true,
                    'size' => 12,
                ],
                'borders' => ['allBorders' => ['borderStyle' => 'thin']],
            ],
            // 6 => ['borders' => ['allBorders' => ['borderStyle' => 'thin']]],
            // 7 => ['borders' => ['allBorders' => ['borderStyle' => 'thin']]],
        ];
    }

  
    public function registerEvents(): array
    {
            $fdate = $this->fdate;
            $sdate = $this->sdate;
            $livestock_fdate = $this->livestock_fdate;
            $livestock_sdate = $this->livestock_sdate;
        return [
            AfterSheet::class => function (AfterSheet $event) use ($fdate, $sdate, $livestock_fdate, $livestock_sdate) {
                $sheet = $event->sheet;
                $today = date('F j, Y');

                $sheet->mergeCells('A2:Q2');
                $sheet->setCellValue('A2', 'LIVESTOCK AND POULTRY POPULATION INVENTORY');
                $sheet->getStyle('A2:Q2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('A2')->getFont()->setBold(true);
                $sheet->getStyle('A2')->getFont()->setSize(21);

                if (Auth::check() && Auth::user()->role === 'admin') {
                    if (!is_null($this->fdate) && !is_null($this->sdate)) {
                        $sheet->mergeCells('A3:Q3');
                        $sheet->setCellValue('A3', date('F j, Y', strtotime($fdate)) . '  to  ' . date('F j, Y', strtotime($sdate)));
                        $sheet->getStyle('A3:Q3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                        $sheet->getStyle('A3')->getFont()->setSize(14);
                    }else{
                        $sheet->mergeCells('A3:Q3');
                        $sheet->setCellValue('A3', $today);
                        $sheet->getStyle('A3:Q3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                        $sheet->getStyle('A3')->getFont()->setSize(14);
                    }
                } else {
                    if (!is_null($this->livestock_fdate) && !is_null($this->livestock_sdate)) {
                        $sheet->mergeCells('A3:Q3');
                        $sheet->setCellValue('A3', date('F j, Y', strtotime($livestock_fdate)) . '  to  ' . date('F j, Y', strtotime($livestock_sdate)));
                        $sheet->getStyle('A3:Q3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                        $sheet->getStyle('A3')->getFont()->setSize(14);
                    }else{
                        $sheet->mergeCells('A3:Q3');
                        $sheet->setCellValue('A3', $today);
                        $sheet->getStyle('A3:Q3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                        $sheet->getStyle('A3')->getFont()->setSize(14);
                    }
                }

                // $sheet->mergeCells('A3:Q3');
                // $sheet->setCellValue('A3', date('F j, Y', strtotime($fdate)) . '  to  ' . date('F j, Y', strtotime($sdate)));
                // $sheet->getStyle('A3:Q3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $sheet->mergeCells('C4:Q4');
                $sheet->setCellValue('C4', 'SPECIES and NUMBER of HEADS');
                $sheet->getStyle('C4:Q4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('C4')->getFont()->setBold(true);
                $sheet->getStyle('C4')->getFont()->setSize(12);
                // $sheet->getStyle('A4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                // $sheet->getStyle('A4:Q4')->getFill()->getStartColor()->setRGB('00FF00');

                $sheet->mergeCells('E5:F5');
                $sheet->setCellValue('E5', 'Swine');
                $sheet->getStyle('E5:F5')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('E5')->getFont()->setBold(true);
                $sheet->getStyle('E5')->getFont()->setSize(12);
                $sheet->getStyle('E5')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $sheet->getStyle('E5')->getFill()->getStartColor()->setRGB('FFFF00');

                $sheet->mergeCells('I5:K5');
                $sheet->setCellValue('I5', 'Chicken');
                $sheet->getStyle('I5:K5')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('I5')->getFont()->setBold(true);
                $sheet->getStyle('I5')->getFont()->setSize(12);
                $sheet->getStyle('I5')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $sheet->getStyle('I5')->getFill()->getStartColor()->setRGB('FFFF00');


                $sheet->mergeCells('M5:N5');
                $sheet->setCellValue('M5', 'Ducks');
                $sheet->getStyle('M5:N5')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('M5')->getFont()->setBold(true);
                $sheet->getStyle('M5')->getFont()->setSize(12);
                $sheet->getStyle('M5')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $sheet->getStyle('M5')->getFill()->getStartColor()->setRGB('FFFF00');
                
                
                $sheet->getStyle('A4:Q4')->getBorders()->getOutline()->setBorderStyle('thin');
                $sheet->getStyle('A5:D5')->getBorders()->getOutline()->setBorderStyle('thin');
                $sheet->getStyle('E5:F5')->getBorders()->getOutline()->setBorderStyle('thin');
                $sheet->getStyle('I5:K5')->getBorders()->getOutline()->setBorderStyle('thin');
                $sheet->getStyle('M5:N5')->getBorders()->getOutline()->setBorderStyle('thin');
                $sheet->getStyle('O5:Q5')->getBorders()->getOutline()->setBorderStyle('thin');
                

                // // Add custom data and apply formatting
                
                // for ($i = 1; $i <= count($this->livestockBrgy); $i++) {
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
                    $livestockQueryDataRowStart = $this->startRow() + count($this->livestockQuery) + 1;
                    $sheet->getDelegate()->getStyle('A7:Q'. $livestockQueryDataRowStart + 2)->applyFromArray([
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '000000'],
                            ],
                        ],
                    ]);

                }else{
                    $livestockBrgyDataRowStart = $this->startRow() + count($this->livestockBrgy) + 1;
                    $sheet->getDelegate()->getStyle('A7:Q'. $livestockBrgyDataRowStart + 2)->applyFromArray([
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
        if(Auth::check() && Auth::user()->role === 'admin'){
            return [
                'Barangay',
                'Carabao',
                'Cattle',
                'Breeder',
                'Fattener',
                'Goat',
                'Sheep',
                'Broiler',
                'Layer',
                'Native',
                'Muscovy',
                'Mallard',
                'Turkey',
                'Geese',
                'Quail',
                'Dog',
                'Horse',
            ];
        }else{
            return [
                'Name of Farmer',
                'Carabao',
                'Cattle',
                'Breeder',
                'Fattener',
                'Goat',
                'Sheep',
                'Broiler',
                'Layer',
                'Native',
                'Muscovy',
                'Mallard',
                'Turkey',
                'Geese',
                'Quail',
                'Dog',
                'Horse',
            ];

        }
    }
}
