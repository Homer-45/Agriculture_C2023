<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;

    protected $table = 'farmers';
    protected $fillable = [
        'reference_number',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'sex',
        'house',
        'street',
        'barangay',
        'city',
        'province',
        'region',
        'mobile',
        'date_birth',
        'place_birth',
        'religion',
        'status',
        'spouse',
        'mothername',
        'govID',
        'id_number',
        'main_livelihood',
        'farming_activity',
        'farmworkers_work',
        'fisherfolk',
        'agri_youth',
        'grossFarming',
        'grossNonFarming',
    ];
} 
