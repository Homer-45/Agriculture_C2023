<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Farmer;
use App\Models\Barangay;
use Illuminate\Http\Request;
use App\Exports\FarmerExport;
use App\Imports\FarmerImport;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class FarmerController extends Controller
{
   public function AllFarmer(){
      $farmers = Farmer::with('barangays')->get();
      return view('farmer.index', compact('farmers'));
   }
   public function AddFarmer(){
    $barangays = Barangay::select(DB::raw("CONCAT(brgy_name) as barangay_name, id"))->get();
      return view('farmer.create', compact('barangays'));
   }
   public function StoreFarmer(Request $request){
      Farmer::create([
         'reference_number'         => $request->reference_number,
         'first_name'               => $request->first_name,
         'middle_name'              => $request->middle_name,
         'last_name'                => $request->last_name,
         'suffix'                   => $request->suffix,
         'sex'                      => $request->sex,
         'house'                    => $request->house,
         'street'                   => $request->street,
         'city'                     => $request->city,
         'province'                 => $request->province,
         'region'                   => $request->region,
         'mobile'                   => $request->mobile,
         'date_birth'               => $request->date_birth,
         'place_birth'              => $request->place_birth,
         'religion'                 => $request->religion,
         'status'                   => $request->status,
         'spouse'                   => $request->spouse,
         'mothername'               => $request->mothername,
         'govID'                    => $request->govID,
         'id_number'                => $request->id_number,
         'barangay_id'              => $request->barangay_id, 
      ]);
      $notification = ([
          'message' =>'Successfully Added Farmer', 'Success',
          'alert-type' => 'success',
      ]);
      return Redirect()->route('all.farmer')->with($notification);
  }

  public function EditFarmer($id){
      $farmers = Farmer::find($id);
      return view('farmer.view', compact('farmers'));
  }

  public function UpdateFarmer(Request $request ,$id){
      $update = Farmer::find($id)->update([
         'reference_number'         => $request->reference_number,
         'first_name'               => $request->first_name,
         'middle_name'              => $request->middle_name,
         'last_name'                => $request->last_name,
         'suffix'                   => $request->suffix,
         'sex'                      => $request->sex,
         'house'                    => $request->house,
         'street'                   => $request->street,
         'barangay'                 => $request->barangay,
         'city'                     => $request->city,
         'province'                 => $request->province,
         'region'                   => $request->region,
         'mobile'                   => $request->mobile,
         'date_birth'               => $request->date_birth,
         'place_birth'              => $request->place_birth,
         'religion'                 => $request->religion,
         'status'                   => $request->status,
         'spouse'                   => $request->spouse,
         'mothername'               => $request->mothername,
         'govID'                    => $request->govID,
         'id_number'                => $request->id_number,
      ]);
      $notification = ([
          'message' =>'Farmer Successfully Updated', 'Success',
          'alert-type' => 'success',
      ]);
      return Redirect()->route('all.farmer')->with($notification);
  }
  public function Delete($id){
    $delete = Farmer::find($id)->delete();
    $notification = ([
        'message' =>'Deleted Successfully', 'Error',
        'alert-type' => 'success',
    ]);
    return redirect()->back()->with($notification);
  }

  public function ImportFarmer(){
      return view('farmer.import_farmer');
  }

  public function Export(){
      return Excel::download(new FarmerExport, 'farmer.xlsx');
  }

  public function Import(Request $request){

    $file = $request->file('import_file', 'XLSX');
    if ($file) {
        // File is not null, proceed with import
        Excel::import(new FarmerImport, $file);
    } else {
        // Handle the case where the file is null
        dd($file, 'Back to previous page');
    }
    $notification = ([
        'message' =>'Farmer Successfully imported', 'Success',
        'alert-type' => 'success',
    ]);
    
    return redirect()->back()->with($notification);
  }

  public function getDate(Request $request){
    $farmers = DB::table('farmers')
                ->join('barangays', 'farmers.barangay_id', '=', 'barangays.id')
                ->select('farmers.*', 'barangays.brgy_name as barangay_name')
                ->whereBetween('farmers.created_at', [$request->fdate, $request->sdate])
                ->get();
    return view('farmer.index', compact('farmers'));
  }


}
