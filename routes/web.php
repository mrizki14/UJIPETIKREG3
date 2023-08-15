<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PelangganFotoController;
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

Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');

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
Route::get('/petugas/{id}', [PetugasController::class,'petugasDetail'])->name('petugas.detail')->middleware('auth');
Route::post('/petugas/{id}', [PetugasController::class,'store'])->name('petugas.store')->middleware('auth');

//VALIDATOR
Route::get('/validator', [ValidatorController::class,'index'])->name('validator.index')->middleware('auth');;
Route::get('/validator/{id}', [ValidatorController::class,'validatorDetail'])->middleware('auth');;
// Route::post('/validator/{id}', [ValidatorController::class,'store']);