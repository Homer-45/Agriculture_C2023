<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use Illuminate\Http\Request;

class FarmerController extends Controller
{
   public function AllFarmer(){
      return view('farmer.index');
   }
   public function AddFarmer(){
      return view('farmer.create');
   }
}
