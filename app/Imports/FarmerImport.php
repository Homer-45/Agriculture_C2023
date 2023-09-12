<?php

namespace App\Imports;

use App\Models\Farmer;
use Maatwebsite\Excel\Concerns\ToModel;

class FarmerImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Farmer([
        'first_name' => $row[0],
        'sex' => $row[1],
        'date_birth' =>$row[2],
]);
    }
}
