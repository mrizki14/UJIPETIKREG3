<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ValidatorController;


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

// LOGIN
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

Route::middleware('auth')->group(function(){
    // DASHBOARD
    Route::get('/', [DashboardController::class,'index']);
    Route::get('/export', [DashboardController::class,'export'])->name('export.excel');

    // LOGOUT
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    // USERS
    Route::resource('users', UserController::class)->only(['edit', 'update', 'destroy', 'index', 'store']);

    // PELANGGAN
    Route::get('/pelanggan', [PelangganController::class,'index'])->name('pelanggan.index');
    Route::post('/pelanggan', [PelangganController::class,'store'])->name('pelanggan.store');

    // PETUGAS
    Route::get('/petugas', [PetugasController::class,'index'])->name('petugas.index');
    Route::get('/petugas/add/{id}', [PetugasController::class,'petugasDetail'])->name('petugas.detail');
    Route::post('/petugas/{id}/{odp}', [PetugasController::class,'store'])->name('petugas.store');
    Route::get('/petugas/revisi/{id}', [PetugasController::class,'revisiBukti'])->name('petugas.revisi');
    Route::put('/petugas/revisi/{id}', [PetugasController::class,'updateBukti'])->name('petugas.update');
    
    // VALIDATOR
    Route::get('/validator', [ValidatorController::class,'index'])->name('validator.index');
    Route::get('/validator/cek/{id}', [ValidatorController::class,'validatorDetail'])->name('validator.cek');
    Route::put('/validator/{id}/save', [ValidatorController::class,'update'])->name('validator.update');
    Route::get('validator/revisi/{id}',[ValidatorController::class,'revisiDariPetugas'])->name('validator.revisi');
    Route::patch('validator/revisi/{id}/save',[ValidatorController::class,'updateRevisi'])->name('validator.revisi.update');

});



