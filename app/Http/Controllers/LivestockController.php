<?php

namespace App\Http\Controllers;

use App\Models\Livestock;
use Illuminate\Http\Request;
use App\Exports\LivestockExport;
use App\Imports\LivestockImport;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class LivestockController extends Controller
{
    public function AllLivestock(){
        $livestocks = Livestock::latest()->get();
        return view('livestock.brgy', compact('livestocks'));
    }
    public function BulanLivestock(){
        $livestoks = Livestock::latest()->get();
        $carabaoCounts = DB::table('livestocks')
                    ->sum('carabao');
                    // dd($carabaoCount);
        return view('livestock.index', compact('livestoks', 'carabaoCounts'));
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

        $notification = ([
            'message' =>'Livestock Successfully Added', 'Success',
            'alert-type' => 'success',
        ]);

        return redirect()->route('all.livestock')->with($notification);
    }

    public function EditLivestock($id){
        $livestocks = Livestock::find($id);
        
        return view('livestock.brgy', compact('livestocks'));
    }

    public function UpdateLivestock(Request $request, $id){
        $update = Livestock::find($id)->update([
            'carabao'   => $request->carabao,
            'cattle'    => $request->cattle,
            'breeder'   => $request->breeder,
            'fattener'  => $request->fattener,
            'goat'      => $request->goat,
            'sheep'     => $request->sheep,
            'broiler'   => $request->broiler,
            'layer'     => $request->layer,
            'native'    => $request->native,
            'muscovy'   => $request->muscovy,
            'mallard'   => $request->mallard,
            'turkey'    => $request->turkey,
            'geese'     => $request->geese,
            'quail'     => $request->quail,
            'dog'       => $request->dog,
            'horse'     => $request->horse,
         ]);
         $notification = ([
             'message' =>'Livestock Successfully Updated', 'Success',
             'alert-type' => 'success',
         ]);
         return redirect()->route('all.livestock')->with($notification);

    }

    public function Delete($id){
        $livestock = Livestock::find($id);
        if (!$livestock) {
            // Handle the case where the farmer record is not found.
            $notification = [
                'message' => 'Record not found',
                'alert-type' => 'error',
            ];
        } else {
            // Delete the farmer record.
            $livestock->delete();
    
            // Notify that deletion was successful.
            $notification = [
                'message' => 'Deleted Successfully',
                'alert-type' => 'success',
            ];
        }
        
        return redirect()->back()->with($notification);

    }

    public function ImportLivestock(){
        return view('livestock.import_livestock');
    }

    public function LivestockExport(){
        return Excel::download(new LivestockExport, 'livestock.xlsx');
    }

    public function LivestockImport(Request $request){
        $file = $request->file('import_Livestockfile', 'XLSX');
        if ($file) {
            // File is not null, proceed with import
            Excel::import(new LivestockImport, $file);
        } else {
            // Handle the case where the file is null
            dd($file, 'Back to previous page');
        }
        $notification = ([
            'message' =>'Livestock Successfully imported', 'Success',
            'alert-type' => 'success',
        ]);
    
    return redirect()->back()->with($notification);
        
    }

}
