<?php

namespace App\Exports;

use App\Models\Farmer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithEvents;

class FarmerExport implements FromCollection, WithHeadings, ShouldAutoSize, WithHeadingRow, WithCustomStartCell, WithStartRow, WithEvents
{
    use Exportable;

    protected $fdate, $sdate;

    public function __construct(Collection $fdate = null, $sdate = null)
    {
        $this->fdate = $fdate;
        $this->sdate = $sdate;
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
        $query = Farmer::join('barangays', 'farmers.barangay_id', '=', 'barangays.id')
            ->select(
                'farmers.first_name',
                'farmers.middle_name',
                'farmers.last_name',
                'farmers.reference_number',
                'barangays.brgy_name',
                'farmers.mobile'
            );

        if (!is_null($this->fdate) && !is_null($this->sdate)) {
            $query->whereBetween('farmers.created_at', [$this->fdate, $this->sdate]);
        }

        return $query->get();
    }


    public function styles(Worksheet $sheet)
    {
        return [
            'A6:F' . ($this->startRow() + $this->collection()->count()) => [
                'font' => [
                    'bold' => true,
                    'size' => 12,
                ],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => 'thin',
                        'color' => ['argb' => '000000'],
                    ],
                ],
            ],
        ];
    }

    public function registerEvents(): array
    {
        $fdate = $this->fdate;
        $sdate = $this->sdate;

        return [
            AfterSheet::class => function (AfterSheet $event) use ($fdate, $sdate) {
                $sheet = $event->getDelegate();

                $today = date('F j, Y');

                // Title
                $sheet->mergeCells('A1:F1');
                $sheet->setCellValue('A1', 'Province of Sorsogon');
                $sheet->getStyle('A1:F1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('A1')->getFont()->setSize(14);

                $sheet->mergeCells('A2:F2');
                $sheet->setCellValue('A2', 'FARMERS DATA');
                $sheet->getStyle('A2:F2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('A2')->getFont()->setSize(14);

                if (!is_null($fdate) && !is_null($sdate)) {
                    $sheet->mergeCells('A3:F3');
                    $sheet->setCellValue('A3', date('F j, Y', strtotime($fdate)) . '  to  ' . date('F j, Y', strtotime($sdate)));
                    $sheet->getStyle('A3:F3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $sheet->getStyle('A3')->getFont()->setSize(14);
                } else {
                    $sheet->mergeCells('A3:F3');
                    $sheet->setCellValue('A3', $today);
                    $sheet->getStyle('A3:F3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $sheet->getStyle('A3')->getFont()->setSize(14);
                }

                $lastRow = $this->startRow() + $this->collection()->count();
                $sheet->getStyle('A5:F' . $lastRow)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
            },
        ];
    }


    public function headings(): array
    {
        return [
            'First name',
            'Middle name',
            'Last name',
            'Reference number',
            'Barangay',
            'Mobile #',
        ];
    }
}