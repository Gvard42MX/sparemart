<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuWarkopController;
use App\Http\Controllers\LaporanKeuanganController;
use App\Http\Controllers\AdminMiddleware;

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
    Route::get('/menu', [MenuWarkopController::class, 'index'])->name('menu.index');


    Route::resource('menu', MenuWarkopController::class);
    Route::get('/keuangan', [LaporanKeuanganController::class, 'index'])->name('Keuangan.index');
Route::get('/keuangan/create', [LaporanKeuanganController::class, 'create'])->name('Keuangan.create');
Route::post('/keuangan', [LaporanKeuanganController::class, 'store'])->name('Keuangan.store');
Route::get('/keuangan/{id}/edit', [LaporanKeuanganController::class, 'edit'])->name('Keuangan.edit');
Route::put('/keuangan/{id}', [LaporanKeuanganController::class, 'update'])->name('Keuangan.update');
Route::delete('/keuangan/{id}', [LaporanKeuanganController::class, 'destroy'])->name('Keuangan.destroy');

Route::middleware(['role:admin'])->group(function () {
        Route::get('/keuangan', [LaporanKeuanganController::class, 'index'])->name('Keuangan.index');
        Route::get('/menu/create', [MenuWarkopController::class, 'create'])->name('menu.create');
        Route::post('/menu/store', [MenuWarkopController::class, 'store'])->name('menu.store');
        Route::get('/menu/{id}/edit', [MenuWarkopController::class, 'edit'])->name('menu.edit');
        Route::put('/menu/{id}', [MenuWarkopController::class, 'update'])->name('menu.update');
        Route::delete('/menu/{id}', [MenuWarkopController::class, 'destroy'])->name('menu.destroy');
    });

    Route::get('/', function () {
    return view('welcome');
})->name('home');

});

require __DIR__.'/auth.php';

?>
