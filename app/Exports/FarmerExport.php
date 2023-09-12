<?php

namespace App\Exports;

use App\Models\Farmer;
use Maatwebsite\Excel\Concerns\FromCollection;

class FarmerExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Farmer::select('first_name','sex','date_birth')->get();
    }
}
