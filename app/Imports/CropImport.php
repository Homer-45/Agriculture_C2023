<?php

namespace App\Imports;

use App\Models\Crop;
use Maatwebsite\Excel\Concerns\ToModel;

class CropImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Crop([
            'talong' => $row[0],
            'balatong' => $row[1],
            'okra' =>$row[2],
            'upo' =>$row[3],
        ]);
    }
}
