<?php

use App\Http\Controllers\MasterJabatanController;
use App\Http\Controllers\MasterPegawaiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionController;

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
    return view('welcome');
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

Route::middleware('auth')->group(function(){
    Route::resource('konfigurasi/roles',RoleController::class);
    Route::resource('konfigurasi/permissions',PermissionController::class);

    // master jabatan
    Route::resource('master-data/master-jabatan', MasterJabatanController::class);
    // master pegawai
    Route::resource('master-data/master-pegawai', MasterPegawaiController::class);
});



// Route::controller(RoleController::class)->group(function(){
//     Route::get('/roles', 'index')->middleware('can:read role');
//     Route::get('/roles/create', 'create')->middlewar('can:create role')
//});
