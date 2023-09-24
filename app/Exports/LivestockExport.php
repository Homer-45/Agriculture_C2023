<?php

namespace App\Exports;

use App\Models\Livestock;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Collection;
use Auth;

class LivestockExport implements WithHeadings, ShouldAutoSize, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */ 
    protected $livestockQuery, $livestockBrgy;

    public function __construct(Collection $livestockQuery, $livestockBrgy)
    {
        $this->livestockQuery = $livestockQuery;
        $this->livestockBrgy = $livestockBrgy;
    }

    public function collection()
    {
        if(Auth::check() && Auth::user()->role === 'admin'){
            return $this->livestockQuery;
        }else{
            return $this->livestockBrgy;
        }
        
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
