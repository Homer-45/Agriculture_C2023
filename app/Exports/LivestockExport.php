<?php

namespace App\Exports;

use App\Models\Livestock;
use Maatwebsite\Excel\Concerns\FromCollection;

class LivestockExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Livestock::all();
    }
}
