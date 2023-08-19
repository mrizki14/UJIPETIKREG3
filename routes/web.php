<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PelangganFotoController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ValidatorController;
use App\Models\Role;

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

Route::get('/', [DashboardController::class,'index'])->middleware('auth');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

//USERS
Route::resource('users', UserController::class)->only(['edit', 'update', 'destroy', 'index', 'store'])->middleware('auth');

//PELANGGAN
Route::get('/pelanggan', [PelangganController::class,'index'])->middleware('auth')->name('pelanggan.index');
Route::post('/pelanggan', [PelangganController::class,'store'])->name('pelanggan.store')->middleware('auth');

//PETUGAS
Route::get('/petugas', [PetugasController::class,'index'])->middleware('auth');
Route::get('/petugas/add/{id}', [PetugasController::class,'petugasDetail'])->name('petugas.detail')->middleware('auth');
Route::post('/petugas/{id}', [PetugasController::class,'store'])->name('petugas.store')->middleware('auth');
Route::get('/petugas/revisi/{id}', [PetugasController::class,'revisiBukti'])->name('petugas.revisi')->middleware('auth');
Route::put('/petugas/revisi/{id}', [PetugasController::class,'updateBukti'])->name('petugas.update')->middleware('auth');


//VALIDATOR
Route::get('/validator', [ValidatorController::class,'index'])->name('validator.index')->middleware('auth');;
Route::get('/validator/cek/{id}', [ValidatorController::class,'validatorDetail'])->name('validator.cek')->middleware('auth');
Route::put('/validator/{id}/save', [ValidatorController::class,'update'])->name('validator.update')->middleware('auth');
Route::get('validator/revisi/{id}',[ValidatorController::class,'revisiDariPetugas'])->name('validator.revisi')->middleware('auth');
Route::patch('validator/revisi/{id}/save',[ValidatorController::class,'updateRevisi'])->name('validator.revisi.update')->middleware('auth');