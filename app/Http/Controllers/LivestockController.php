<?php

namespace App\Http\Controllers;

use App\Models\Livestock;
use Illuminate\Http\Request;

class LivestockController extends Controller
{
    public function AllLivestock(){
        return view('livestock.index');
    }
    public function AddLivestock(){
        return view('livestock.create');
    }

}
