<?php

namespace App\Http\Controllers;

use App\Models\Livestock;
use Illuminate\Http\Request;

class LivestockController extends Controller
{
    public function AllLivestock(){
        $livestocks = Livestock::latest()->get();
        return view('livestock.brgy', compact('livestocks'));
    }
    public function AddLivestock(){
        return view('livestock.create');
    }
    public function Submit(Request $request){

        // Validate the form data
        $validate = $request->validate([
            'carabao'   => 'required|integer',
            'cattle'    => 'required|integer',
            'breeder'   => 'required|integer',
            'fattener'  => 'required|integer',
            'goat'      => 'required|integer',
            'sheep'     => 'required|integer',
            'broiler'   => 'required|integer',
            'layer'     => 'required|integer',
            'native'    => 'required|integer',
            'muscovy'   => 'required|integer',
            'mallard'   => 'required|integer',
            'turkey'    => 'required|integer',
            'geese'     => 'required|integer',
            'quail'     => 'required|integer',
            'dog'       => 'required|integer',
            'horse'     => 'required|integer',
            
        ]);

        // Save form data to the database
        $submission = new Livestock();
        $submission->carabao = $validate['carabao'];
        $submission->cattle = $validate['cattle'];
        $submission->breeder = $validate['breeder'];
        $submission->fattener = $validate['fattener'];
        $submission->goat = $validate['goat'];   
        $submission->sheep = $validate['sheep'];  
        $submission->broiler= $validate['broiler'];
        $submission->layer = $validate['layer'];  
        $submission->native = $validate['native']; 
        $submission->muscovy = $validate['muscovy'];
        $submission->mallard = $validate['mallard'];
        $submission->turkey = $validate['turkey']; 
        $submission->geese = $validate['geese'];  
        $submission->quail = $validate['quail'];  
        $submission->dog = $validate['dog'];    
        $submission->horse = $validate['horse'];
        $submission->save();

        $responseMessage = "Form submitted successfully for";

        return response()->json(['message' => $responseMessage]);
    }

}
