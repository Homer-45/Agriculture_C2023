<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Farmer;
use App\Models\User;


class Barangay extends Model
{
    use HasFactory;

    protected $table = 'barangays';
    protected $fillable = [
        'brgy_name',
    ];
    // parent hasMany
    public function farmers(){
        return $this->hasMany(Farmer::class);
    }
    public function user(){
        return $this->hasMany(User::class);
    }

}
