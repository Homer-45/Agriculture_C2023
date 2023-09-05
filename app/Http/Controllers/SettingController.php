<?php

namespace App\Http\Controllers;

// use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function Account(){

        return view('settings.account');
    }
    public function Calendar(){
        return view('calendars.index');
    }
}