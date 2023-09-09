<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];
}
