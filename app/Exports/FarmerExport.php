<?php

namespace App\Exports;

use App\Models\Farmer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class FarmerExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array{
        return[
            'first_name',
            'middle_name',
            'last_name',
            'reference_number',
            'brgy_name',
            'mobile',
        ];

    }
    public function collection()
    {
        return Farmer::with('barangays')->select(
            'first_name',
            'middle_name',
            'last_name',
            'reference_number',
            'barangay_id',
            'mobile',
            )->get();
    }
    public function map($row): array{
        return[
            $row ['first_name'],
            $row ['middle_name'],
            $row ['last_name'],
            $row ['reference_number'],
            $row ['barangay_id'],
            $row ['mobile'],

        ];
    }
}
