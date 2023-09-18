<?php

namespace App\Http\Controllers;

// use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class SettingController extends Controller
{
    public function Account(){
        $users = User::latest()->get();
        return view('settings.account', compact('users'));
    }
    public function Calendar(){
        return view('calendars.index');
    }
}