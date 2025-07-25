<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;

// Route::get('/', function () {
//     return view('dashboard');
// });

Route::get('/', [DashboardController::class, 'index']);  
// Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa'); 
// Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
// Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store'); 
Route::resource('/mahasiswa', MahasiswaController::class);
Route::resource('/prodi', ProdiController::class);
