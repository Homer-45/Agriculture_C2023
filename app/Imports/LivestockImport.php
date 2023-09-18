<?php

namespace App\Imports;

use App\Models\Livestock;
use Maatwebsite\Excel\Concerns\ToModel;

class LivestockImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Livestock([
            'carabao' => $row[0],
            'cattle' => $row[1],
            'breeder' =>$row[2],
            'fattener' =>$row[3],
        ]);
    }
}
