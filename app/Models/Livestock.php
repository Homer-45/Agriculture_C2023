<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Farmer;


class Livestock extends Model
{
    use HasFactory;

    protected $table ='livestocks';
    protected $fillable = [

        'carabao',
        'cattle',
        'breeder',
        'fattener',
        'goat',
        'sheep',
        'broiler',
        'layer',
        'native',
        'muscovy',
        'mallard',
        'turkey',
        'geese',
        'quail',
        'dog',
        'horse',
        'farmers_id',
    ];
    public function farmers(){
        return $this->belongsTo(Farmer::class);
    }
    

}
