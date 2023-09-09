<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use Illuminate\Http\Request;

class FarmerController extends Controller
{
   public function AllFarmer(){
      $farmers = Farmer::latest()->get();
      return view('farmer.index', compact('farmers'));
   }
   public function AddFarmer(){
      return view('farmer.create');
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
         // 'main_livelihood'          => explode(',', $request->main_livelihood),
         // 'farming_activity'         => $request->farming_activity,
         // 'farmworkers_work'         => $request->farmworkers_work,
         // 'fisherfolk'               => $request->fisherfolk,
         // 'agri_youth'               => $request->agri_youth,
         // 'grossFarming'             => $request->grossFarming,
         // 'grossNonFarming'          => $request->grossNonFarming, 
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
         // 'main_livelihood'          => explode(',', $request->main_livelihood),
         // 'farming_activity'         => $request->farming_activity,
         // 'farmworkers_work'         => $request->farmworkers_work,
         // 'fisherfolk'               => $request->fisherfolk,
         // 'agri_youth'               => $request->agri_youth,
         // 'grossFarming'             => $request->grossFarming,
         // 'grossNonFarming'          => $request->grossNonFarming,
      ]);
      $notification = ([
          'message' =>'Farmer Successfully Updated', 'Success',
          'alert-type' => 'success',
      ]);
      return Redirect()->route('all.farmer')->with($notification);
  }
}
