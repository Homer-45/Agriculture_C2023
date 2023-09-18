<?php

namespace App\Exports;

use App\Models\Crop;
use Maatwebsite\Excel\Concerns\FromCollection;

class CropExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Crop::all();
    }
}
