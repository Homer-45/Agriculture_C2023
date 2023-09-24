<?php

namespace App\Exports;
 
use App\Models\Crop;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Collection;
use Auth;

class CropExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $cropQuery, $cropsBrgy;
 
    public function __construct(Collection $cropQuery, $cropsBrgy)
    {
        $this->cropQuery = $cropQuery;
        $this->cropsBrgy = $cropsBrgy;
    }
    public function collection()
    {
        if(Auth::check() && Auth::user()->role === 'admin'){
            return $this->cropQuery;
        }else{
            return $this->cropsBrgy;
        }
    }
    public function headings(): array{
        if(Auth::check() && Auth::user()->role === 'admin'){
            return[
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
        }else{
            return[
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
