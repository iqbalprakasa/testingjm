<?php

use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResepController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
 
Route::get('/dashboard', [PasienController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::get('/masterobat', [ObatController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('masterobat');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Pasien
    Route::get('/pasien/create', [PasienController::class, 'create'])->name('pasien.create');
    Route::post('/pasien/store', [PasienController::class, 'store'])->name('pasien.store');
    //Diagnosa
    Route::get('/diagnosa/create/{pasien}', [DiagnosaController::class, 'create'])->name('diagnosa.create');
    Route::post('/diagnosa/store', [DiagnosaController::class, 'store'])->name('diagnosa.store');
    //Perawat
    Route::get('/sistolik/create/{pasien}', [DiagnosaController::class, 'create'])->name('sistolik.create');
    Route::post('/sistolik', [DiagnosaController::class, 'sistolik'])->name('diagnosa.sistolik');
    //Obat
    Route::get('/obat/create', [ObatController::class, 'create'])->name('obat.create');
    Route::post('/obat/store', [ObatController::class, 'store'])->name('obat.store');
    //Resep
    Route::get('/resep/create', [ResepController::class, 'create'])->name('resep.create');
    Route::post('/resep/store', [ResepController::class, 'store'])->name('resep.store');
    Route::delete('/resep/{resep}', [ResepController::class, 'destroy'])->name('resep.destroy');
     //Hasil Pemeriksaan
     Route::get('/hasil/hasil', [PasienController::class, 'hasil'])->name('pasien.hasil');
});

require __DIR__.'/auth.php';
