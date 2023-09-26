<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barangay;
use App\Models\Crop;
use App\Models\Livestock;

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
        'users_id',
        'barangay_id'

    ];

    public function barangays(){
        return $this->belongsTo(Barangay::class, 'barangay_id');
    }
    public function getBarangayNameAttribute()
    {
        return $this->barangays->brgy_name;
    }

    public function crops(){
        return $this->hasMany(Crop::class);
    }

    public function livestock(){
        return $this->hasMany(Livestock::class);
    }
} 
