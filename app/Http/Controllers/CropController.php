<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\Farmer;
use Illuminate\Http\Request;
use App\Exports\CropExport;
use App\Imports\CropImport;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class CropController extends Controller
{
    public function AllCrop(Request $request){
        $cropsBrgy = DB::table('crops')
                    ->join('farmers', 'crops.farmers_id', '=', 'farmers.id')
                    ->join('barangays', 'farmers.barangay_id', '=', 'barangays.id')
                    ->select(
                        DB::raw("CONCAT(farmers.first_name, ' ', farmers.last_name) as full_name"),
                        'crops.id',
                        'crops.talong',
                        'crops.balatong',
                        'crops.okra',
                        'crops.upo',
                        'crops.sili',
                        'crops.ampalaya',
                        'crops.pechay',
                        'crops.pipino',
                        'crops.patola',
                        'crops.tomato',
                        'crops.kalabasa',
                        'crops.mango'
                    )
                    ->groupBy(
                        'full_name',
                        'crops.id',
                        'crops.created_at',
                        'crops.talong',
                        'crops.balatong',
                        'crops.okra',
                        'crops.upo',
                        'crops.sili',
                        'crops.ampalaya',
                        'crops.pechay',
                        'crops.pipino',
                        'crops.patola',
                        'crops.tomato',
                        'crops.kalabasa',
                        'crops.mango'
                    );
                    if ($request->has('crop_fdate') && $request->has('crop_sdate')) {
                        $crop_fdate = $request->input('crop_fdate');
                        $crop_sdate = $request->input('crop_sdate');
                        $cropsBrgy->whereBetween('crops.created_at', [$crop_fdate, $crop_sdate]);
                    }
                    $cropData = $cropsBrgy->get(); 
        $farmers = Farmer::select(DB::raw("CONCAT(first_name, ' ', last_name) as full_name, id"))->get();
        return view('crop.index', compact('cropData', 'farmers'));
    }
    public function BulanCrop(Request $request){
        $crops = Crop::latest()->get();
        $cropQuery = DB::table('crops')
                        ->join('farmers', 'crops.farmers_id', '=', 'farmers.id')
                        ->join('barangays', 'farmers.barangay_id', '=', 'barangays.id')
                        ->select('barangays.brgy_name',
                            DB::raw('SUM(crops.talong) as talong_sum'),
                            DB::raw('SUM(crops.balatong) as balatong_sum'),
                            DB::raw('SUM(crops.okra) as okra_sum'),
                            DB::raw('SUM(crops.upo) as upo_sum'),
                            DB::raw('SUM(crops.sili) as sili_sum'),
                            DB::raw('SUM(crops.ampalaya) as ampalaya_sum'),
                            DB::raw('SUM(crops.pechay) as pechay_sum'),
                            DB::raw('SUM(crops.pipino) as pipino_sum'),
                            DB::raw('SUM(crops.patola) as patola_sum'),
                            DB::raw('SUM(crops.tomato) as tomato_sum'),
                            DB::raw('SUM(crops.kalabasa) as kalabasa_sum'),
                            DB::raw('SUM(crops.mango) as mango_sum'),
                        )
                        ->groupBy('farmers.barangay_id', 'barangays.brgy_name');
                        if ($request->has('fdate') && $request->has('sdate')) {
                            $fdate = $request->input('fdate');
                            $sdate = $request->input('sdate');
                            $cropQuery->whereBetween('crops.created_at', [$fdate, $sdate]);
                        }
                        $cropCounts = $cropQuery->get();
        return view('crop.bulan', compact('crops', 'cropCounts'));
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
            'farmers_id'=> $request->farmers_id,
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
            'farmers_id'=> $request->farmers_id,
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

    public function CropExport(Request $request){
        $crop_fdate = $request->input('crop_fdate');
        $crop_sdate = $request->input('crop_sdate');
        $cropData = DB::table('crops')
                    ->join('farmers', 'crops.farmers_id', '=', 'farmers.id')
                    ->join('barangays', 'farmers.barangay_id', '=', 'barangays.id')
                    ->select(
                        DB::raw("CONCAT(farmers.first_name, ' ', farmers.last_name) as full_name"),
                        'crops.talong',
                        'crops.balatong',
                        'crops.okra',
                        'crops.upo',
                        'crops.sili',
                        'crops.ampalaya',
                        'crops.pechay',
                        'crops.pipino',
                        'crops.patola',
                        'crops.tomato',
                        'crops.kalabasa',
                        'crops.mango'
                    )
                    ->groupBy(
                        'full_name',
                        'crops.talong',
                        'crops.balatong',
                        'crops.okra',
                        'crops.upo',
                        'crops.sili',
                        'crops.ampalaya',
                        'crops.pechay',
                        'crops.pipino',
                        'crops.patola',
                        'crops.tomato',
                        'crops.kalabasa',
                        'crops.mango'
                    );
                    if ($request->has('crop_fdate') && $request->has('crop_sdate')) {
                        $crop_fdate = $request->input('crop_fdate');
                        $crop_sdate = $request->input('crop_sdate');
                        $cropData->whereBetween('crops.created_at', [$crop_fdate, $crop_sdate]);
                    } // Group by the extracted date
                    $cropsBrgy = $cropData->get(); 
                    
        $fdate = $request->input('fdate');
        $sdate = $request->input('sdate');
        $cropExport = DB::table('crops')
                    ->join('farmers', 'crops.farmers_id', '=', 'farmers.id')
                    ->join('barangays', 'farmers.barangay_id', '=', 'barangays.id')
                    ->select('barangays.brgy_name',
                        DB::raw('SUM(crops.talong) as talong_sum'),
                        DB::raw('SUM(crops.balatong) as balatong_sum'),
                        DB::raw('SUM(crops.okra) as okra_sum'),
                        DB::raw('SUM(crops.upo) as upo_sum'),
                        DB::raw('SUM(crops.sili) as sili_sum'),
                        DB::raw('SUM(crops.ampalaya) as ampalaya_sum'),
                        DB::raw('SUM(crops.pechay) as pechay_sum'),
                        DB::raw('SUM(crops.pipino) as pipino_sum'),
                        DB::raw('SUM(crops.patola) as patola_sum'),
                        DB::raw('SUM(crops.tomato) as tomato_sum'),
                        DB::raw('SUM(crops.kalabasa) as kalabasa_sum'),
                        DB::raw('SUM(crops.mango) as mango_sum'),
                    )
                    ->groupBy('farmers.barangay_id', 'barangays.brgy_name');
                    if ($request->has('fdate') && $request->has('sdate')) {
                        $fdate = $request->input('fdate');
                        $sdate = $request->input('sdate');
                        $cropExport->whereBetween('crops.created_at', [$fdate, $sdate]);
                    }
                    $cropQuery = $cropExport->get();
        return Excel::download(new CropExport($cropQuery, $cropsBrgy, $fdate, $sdate, $crop_fdate, $crop_sdate), 'crops.xlsx');
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
