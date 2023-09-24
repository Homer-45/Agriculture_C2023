<?php

namespace App\Http\Controllers;

use App\Models\Livestock;
use Illuminate\Http\Request;
use App\Exports\LivestockExport;
use App\Imports\LivestockImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Farmer;
use DB;


class LivestockController extends Controller
{
    public function AllLivestock(Request $request){
        // $livestocks = Livestock::with('farmers')->latest()->get();
        $livestockBrgy = DB::table('livestocks')
                    ->join('farmers', 'livestocks.farmers_id', '=', 'farmers.id')
                    ->join('barangays', 'farmers.barangay_id', '=', 'barangays.id')
                    ->select(
                        DB::raw("CONCAT(farmers.first_name, ' ', farmers.last_name) as full_name"),
                        'livestocks.id',
                        'livestocks.carabao',
                        'livestocks.cattle',
                        'livestocks.breeder',
                        'livestocks.fattener',
                        'livestocks.goat',
                        'livestocks.sheep',
                        'livestocks.broiler',
                        'livestocks.layer',
                        'livestocks.native',
                        'livestocks.muscovy',
                        'livestocks.mallard',
                        'livestocks.turkey',
                        'livestocks.geese',
                        'livestocks.quail',
                        'livestocks.dog',
                        'livestocks.horse'
                    )
                    ->groupBy(
                        'full_name',
                        'livestocks.id',
                        'livestocks.carabao',
                        'livestocks.cattle',
                        'livestocks.breeder',
                        'livestocks.fattener',
                        'livestocks.goat',
                        'livestocks.sheep',
                        'livestocks.broiler',
                        'livestocks.layer',
                        'livestocks.native',
                        'livestocks.muscovy',
                        'livestocks.mallard',
                        'livestocks.turkey',
                        'livestocks.geese',
                        'livestocks.quail',
                        'livestocks.dog',
                        'livestocks.horse'
                    );
                    if ($request->has('livestock_fdate') && $request->has('livestock_sdate')) {
                        $livestock_fdate = $request->input('livestock_fdate');
                        $livestock_sdate = $request->input('livestock_sdate');
                        $livestockBrgy->whereBetween('livestocks.created_at', [$livestock_fdate, $livestock_sdate]);
                    } // Group by the extracted date
                    $livestockData = $livestockBrgy->get(); 
        $farmers = Farmer::select(DB::raw("CONCAT(first_name, ' ', last_name) as full_name, id"))->get();
        return view('livestock.brgy', compact('livestockData', 'farmers'));
    }
    public function BulanLivestock(Request $request){
        $livestocks = Livestock::latest()->get();
        $livestockQuery = DB::table('livestocks')
                        ->join('farmers', 'livestocks.farmers_id', '=', 'farmers.id')
                        ->join('barangays', 'farmers.barangay_id', '=', 'barangays.id')
                        ->select('barangays.brgy_name',
                            DB::raw('SUM(livestocks.carabao) as carabao_sum'),
                            DB::raw('SUM(livestocks.cattle) as cattle_sum'),
                            DB::raw('SUM(livestocks.breeder) as breeder_sum'),
                            DB::raw('SUM(livestocks.fattener) as fattener_sum'),
                            DB::raw('SUM(livestocks.goat) as goat_sum'),
                            DB::raw('SUM(livestocks.sheep) as sheep_sum'),
                            DB::raw('SUM(livestocks.broiler) as broiler_sum'),
                            DB::raw('SUM(livestocks.layer) as layer_sum'),
                            DB::raw('SUM(livestocks.native) as native_sum'),
                            DB::raw('SUM(livestocks.muscovy) as muscovy_sum'),
                            DB::raw('SUM(livestocks.mallard) as mallard_sum'),
                            DB::raw('SUM(livestocks.turkey) as turkey_sum'),
                            DB::raw('SUM(livestocks.geese) as geese_sum'),
                            DB::raw('SUM(livestocks.quail) as quail_sum'),
                            DB::raw('SUM(livestocks.dog) as dog_sum'),
                            DB::raw('SUM(livestocks.horse) as horse_sum')
                        )
                        ->groupBy('farmers.barangay_id', 'barangays.brgy_name');
                        if ($request->has('fdate') && $request->has('sdate')) {
                            $fdate = $request->input('fdate');
                            $sdate = $request->input('sdate');
                            $livestockQuery->whereBetween('livestocks.created_at', [$fdate, $sdate]);
                        }
                        $livestockCounts = $livestockQuery->get();
                        
        return view('livestock.index', compact('livestocks', 'livestockCounts'));
    }
    public function AddLivestock(){
        return view('livestock.create');
    }
    public function Submit(Request $request){
        Livestock::create([
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
            'farmers_id'=> $request->farmers_id,
        ]);

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
            'farmers_id'=> $request->farmers_id,
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

    public function LivestockExport(Request $request){
        $livestockData = DB::table('livestocks')
                    ->join('farmers', 'livestocks.farmers_id', '=', 'farmers.id')
                    ->join('barangays', 'farmers.barangay_id', '=', 'barangays.id')
                    ->select(
                        DB::raw("CONCAT(farmers.first_name, ' ', farmers.last_name) as full_name"),
                        'livestocks.carabao',
                        'livestocks.cattle',
                        'livestocks.breeder',
                        'livestocks.fattener',
                        'livestocks.goat',
                        'livestocks.sheep',
                        'livestocks.broiler',
                        'livestocks.layer',
                        'livestocks.native',
                        'livestocks.muscovy',
                        'livestocks.mallard',
                        'livestocks.turkey',
                        'livestocks.geese',
                        'livestocks.quail',
                        'livestocks.dog',
                        'livestocks.horse'
                    )
                    ->groupBy(
                        'full_name',
                        'livestocks.carabao',
                        'livestocks.cattle',
                        'livestocks.breeder',
                        'livestocks.fattener',
                        'livestocks.goat',
                        'livestocks.sheep',
                        'livestocks.broiler',
                        'livestocks.layer',
                        'livestocks.native',
                        'livestocks.muscovy',
                        'livestocks.mallard',
                        'livestocks.turkey',
                        'livestocks.geese',
                        'livestocks.quail',
                        'livestocks.dog',
                        'livestocks.horse'
                    );
                    if ($request->has('livestock_fdate') && $request->has('livestock_sdate')) {
                        $livestock_fdate = $request->input('livestock_fdate');
                        $livestock_sdate = $request->input('livestock_sdate');
                        $livestockData->whereBetween('livestocks.created_at', [$livestock_fdate, $livestock_sdate]);
                    } // Group by the extracted date
                    $livestockBrgy = $livestockData->get(); 
        $fdate = $request->input('fdate');
        $sdate = $request->input('sdate');
        $livestockExport = DB::table('livestocks')
                        ->join('farmers', 'livestocks.farmers_id', '=', 'farmers.id')
                        ->join('barangays', 'farmers.barangay_id', '=', 'barangays.id')
                        ->select('barangays.brgy_name',
                            DB::raw('SUM(livestocks.carabao) as carabao_sum'),
                            DB::raw('SUM(livestocks.cattle) as cattle_sum'),
                            DB::raw('SUM(livestocks.breeder) as breeder_sum'),
                            DB::raw('SUM(livestocks.fattener) as fattener_sum'),
                            DB::raw('SUM(livestocks.goat) as goat_sum'),
                            DB::raw('SUM(livestocks.sheep) as sheep_sum'),
                            DB::raw('SUM(livestocks.broiler) as broiler_sum'),
                            DB::raw('SUM(livestocks.layer) as layer_sum'),
                            DB::raw('SUM(livestocks.native) as native_sum'),
                            DB::raw('SUM(livestocks.muscovy) as muscovy_sum'),
                            DB::raw('SUM(livestocks.mallard) as mallard_sum'),
                            DB::raw('SUM(livestocks.turkey) as turkey_sum'),
                            DB::raw('SUM(livestocks.geese) as geese_sum'),
                            DB::raw('SUM(livestocks.quail) as quail_sum'),
                            DB::raw('SUM(livestocks.dog) as dog_sum'),
                            DB::raw('SUM(livestocks.horse) as horse_sum')
                        )
                        ->groupBy('farmers.barangay_id', 'barangays.brgy_name');
                        if ($request->has('fdate') && $request->has('sdate')) {
                            $fdate = $request->input('fdate');
                            $sdate = $request->input('sdate');
                            $livestockExport->whereBetween('livestocks.created_at', [$fdate, $sdate]);
                        }
                        $livestockQuery = $livestockExport->get();
                        

        return Excel::download(new LivestockExport($livestockQuery, $livestockBrgy), 'livestock.xlsx');
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
