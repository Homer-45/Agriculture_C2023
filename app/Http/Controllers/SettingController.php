<?php

namespace App\Http\Controllers;

// use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Barangay;
use DB;

class SettingController extends Controller
{
    public function Account(){
        $users = User::with('barangays')->get();
        $barangays = Barangay::select(DB::raw("CONCAT(brgy_name) as barangay_name, id"))->get();
        return view('settings.account', compact('users', 'barangays'));
    }
    public function Calendar(){
        return view('calendars.index');
    }
    public function StoreUser(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'unique:users,username'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required'],
            'barangay_id' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'barangay_id' => $request->barangay_id,
        ]);

        $notification = ([
            'message' => 'User Created Successfully',
            'alert-type' => 'success',
        ]);
        
        return redirect()->back()->with($notification);
    }
    public function Edit($id){
        $users = User::find($id);
        return view('account', compact('users'));
    }
    public function Update(Request $request){

        $validated = $request->validate([
            'name' => 'required|string',
            'username' => 'required|string|unique:users,username,'.$request->id,
            'email' => 'required|email|string|unique:users,email,'.$request->id,
            'role' => 'required',
        ]);

        $user = User::find($request->id);
        $user -> name = $request->name;
        $user -> username = $request->username;
        $user -> email = $request->email;
        $user -> role = $request->role;
        $user -> barangay_id = $request->barangay_id;
        $user -> update();

        $notification = ([
            'message' => 'User Successfully Updated',
            'alert-type' => 'success',
        ]);

        return Redirect()->route('account')->with($notification);
    }
    public function ChangePassword(Request $request){
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $update = User::find($request->id)->update([
            'password' => Hash::make($request->password),
        ]);

        $notification = ([
            'message' => 'Successfully Change Password',
            'alert-type' => 'success',
        ]);

        return Redirect()->route('account')->with($notification);
    }
    public function Delete($id){
        $delete = User::find($id)->delete();
        $notification = ([
            'message' =>'Deleted Successfully',
            'alert-type' => 'error',
        ]);
        return Redirect()->back()->with($notification);
    }
}