<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\LivestockController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\SettingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function(){

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    // Livestock
    Route::get('/all/livestock', [LivestockController::class, 'AllLivestock'])->name('all.livestock');
    Route::get('/add/livestock', [LivestockController::class, 'AddLivestock'])->name('add.livestock');
    // Farmer
    Route::get('/all/farmer', [FarmerController::class, 'AllFarmer'])->name('all.farmer');
    Route::get('/add/farmer', [FarmerController::class, 'AddFarmer'])->name('add.farmer');


}); //Admin Group middleware

Route::middleware(['auth', 'role:agent'])->group(function(){

    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');

}); //Agent Group middleware

Route::get('/account', [SettingController::class, 'Account'])->name('account');
Route::get('/calendar', [SettingController::class, 'Calendar'])->name('calendar');
// User or Barangay
Route::post('/submit-form', [LivestockController::class, 'Submit'])->name('submit-form');