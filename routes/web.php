<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\LivestockController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\CropController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware(['auth'])->group(function(){

    // Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/agriculture/dashboard', [AdminController::class, 'AgricultureDashboard'])->name('agriculture.dashboard');

    Route::post('/submit-form', [LivestockController::class, 'Submit'])->name('submit-form');
    Route::get('/calendar', [SettingController::class, 'Calendar'])->name('calendar');
    // User or Barangay

    Route::get('/account', [SettingController::class, 'Account'])->name('account');
    Route::post('/store/user', [SettingController::class, 'StoreUser'])->name('store.user');
    Route::get('/edit/{id}', [SettingController::class, 'Edit']);
    Route::post('/update/{id}', [SettingController::class, 'Update'])->name('update.user');
    Route::get('/delete/{id}', [SettingController::class, 'Delete']);
    Route::get('/forgot/{id}', [SettingController::class, 'ForgotPassword']);
    Route::post('/change/{id}', [SettingController::class, 'ChangePassword']);

    Route::get('/prof/{id}', [AdminController::class, 'AccountUser'])->name('prof'); //User

    // Farmer
    Route::get('/all/farmer', [FarmerController::class, 'AllFarmer'])->name('all.farmer');
    Route::get('/add/farmer', [FarmerController::class, 'AddFarmer'])->name('add.farmer');
    Route::post('/store/farmer', [FarmerController::class, 'StoreFarmer'])->name('store.farmer');
    Route::get('/farmer/edit/{id}', [FarmerController::class, 'EditFarmer']);
    Route::post('/farmer/update/{id}', [FarmerController::class, 'UpdateFarmer']);
    Route::get('/delete/farmer/{id}', [FarmerController::class, 'Delete']);
    Route::post('/select/farmer', [FarmerController::class, 'getDate']);
    // Farmer Ex and Im
    Route::get('/import/farmer', [FarmerController::class, 'ImportFarmer'])->name('import.farmer');
    Route::get('/export', [FarmerController::class, 'Export'])->name('export');
    Route::post('/import', [FarmerController::class, 'Import'])->name('import');

    
    // Livestock
    Route::get('/all/livestock', [LivestockController::class, 'AllLivestock'])->name('all.livestock');
    Route::get('/bulan/livestock', [LivestockController::class, 'BulanLivestock'])->name('bulan.livestock');
    Route::get('/add/livestock', [LivestockController::class, 'AddLivestock'])->name('add.livestock');
    Route::get('/livestock/edit/{id}', [LivestockController::class, 'EditLivestock']);
    Route::post('/livestock/update/{id}', [LivestockController::class, 'UpdateLivestock']);
    Route::get('/delete/livestock/{id}', [LivestockController::class, 'Delete']);
    // Livestock Ex and Im
    Route::get('/import/livestock', [LivestockController::class, 'ImportLivestock'])->name('import.livestock');
    Route::get('/livestock/export', [LivestockController::class, 'LivestockExport'])->name('livestock.export');
    Route::post('/livestock/import', [LivestockController::class, 'LivestockImport'])->name('livestock.import');

    // Crop
    Route::get('/all/crop', [CropController::class, 'AllCrop'])->name('all.crop');
    Route::get('/add/crop', [CropController::class, 'AddCrop'])->name('add.crop');
    Route::post('/store/crop', [CropController::class, 'StoreCrop'])->name('store.crop');
    Route::get('/crop/edit/{id}', [CropController::class, 'EditCrop']);
    Route::post('/crop/update/{id}', [CropController::class, 'UpdateCrop']);
    Route::get('/delete/crop/{id}', [CropController::class, 'Delete']);
   
    // Crops Ex and Im
    Route::get('/import/crop', [CropController::class, 'ImportCrop'])->name('import.crop');
    Route::get('/crop/export', [CropController::class, 'CropExport'])->name('crop.export');
    Route::post('/crop/import', [CropController::class, 'CropImport'])->name('crop.import');

    Route::get('/bulan/crop', [CropController::class, 'BulanCrop'])->name('bulan.crop');
});

require __DIR__.'/auth.php';