<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Farmer;

class Crop extends Model
{
    use HasFactory;

    protected $table = 'crops';
    protected $fillable = [
        'talong',
        'balatong',
        'okra',
        'upo',
        'sili',
        'ampalaya',
        'pechay',
        'pipino',
        'patola',
        'tomato',
        'kalabasa',
        'mango',
        'farmers_id',
    ];

    public function farmers(){
        return $this->belongsTo(Farmer::class);
    }
}
