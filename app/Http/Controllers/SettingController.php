<?php

namespace App\Http\Controllers;

// use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use DB;

class SettingController extends Controller
{
    public function Account(){
        $users = DB::table('users')->latest()->get();
        return view('settings.account', compact('users'));
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
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        $notification = ([
            'message' => 'User Created Successfully',
            'alert-type' => 'success',
        ]);
        dd($user);
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
        $user -> update();

        $notification = ([
            'message' => 'User Successfully Updated',
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