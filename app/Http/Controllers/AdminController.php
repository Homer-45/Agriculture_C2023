<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AgricultureDashboard(){

        return view('admin.admin_dashboard');
    }
}
