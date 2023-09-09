<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use Illuminate\Http\Request;

class CropController extends Controller
{
    public function AllCrop(){
        $crops = Crop::latest()->get();
        return view('crop.index', compact('crops'));
    }
    public function StoreCrop(Request $request){
        Crop::create([
            'talong'    => $request->talong,
            'balatong'  => $request->balatong,
            'okra'      => $request->okra,
            'upo'       => $request->upo,
            'sili'      => $request->sili,
            'ampalaya'  => $request->ampalaya,
            'pechay'    => $request->pechay,
            'pipino'    => $request->pipino,
            'patola'    => $request->patola,
            'tomato'    => $request->tomato,
            'kalabasa'  => $request->kalabasa,
            'mango'     => $request->mango,
         ]);
         $notification = ([
             'message' =>'Successfully Added Farmer', 'Success',
             'alert-type' => 'success',
         ]);
         return Redirect()->route('all.crop')->with($notification);
    }
}
