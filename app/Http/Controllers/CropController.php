<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use Illuminate\Http\Request;
use App\Exports\CropExport;
use App\Imports\CropImport;
use Maatwebsite\Excel\Facades\Excel;

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
    public function EditCrop($id){
        $crops = Crop::find($id);
        
        return view('farmer.index', compact('crops'));
    }
    public function UpdateCrop(Request $request, $id){
        $update = Crop::find($id)->update([
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
             'message' =>'Farmer Successfully Updated', 'Success',
             'alert-type' => 'success',
         ]);
         return Redirect()->route('all.crop')->with($notification);
    }
    public function Delete($id){
        $crop = Crop::find($id);
        if (!$crop) {
            // Handle the case where the farmer record is not found.
            $notification = [
                'message' => 'Record not found',
                'alert-type' => 'error',
            ];
        } else {
            // Delete the farmer record.
            $crop->delete();
    
            // Notify that deletion was successful.
            $notification = [
                'message' => 'Deleted Successfully',
                'alert-type' => 'success',
            ];
        }
        
        return redirect()->back()->with($notification);
    }

    public function ImportCrop(){
        return view('crop.import_crop');
    }

    public function CropExport(){
        return Excel::download(new CropExport, 'crops.xlsx');
    }

    public function CropImport(Request $request){
        $file = $request->file('import_Cropfile', 'XLSX');
        if ($file) {
            // File is not null, proceed with import
            Excel::import(new CropImport, $file);
        } else {
            // Handle the case where the file is null
            dd($file, 'Back to previous page');
        }
        $notification = ([
            'message' =>'Crop Successfully imported', 'Success',
            'alert-type' => 'success',
        ]);
    
    return redirect()->back()->with($notification);
        
    }

}
