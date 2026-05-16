<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InputController;
use App\Http\Controllers\DashboardController;


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| Penghuni / Statistik
|--------------------------------------------------------------------------
*/

Route::get('/input/penghuni', [InputController::class, 'penghuniForm'])
    ->name('input.penghuni');

Route::post('/input/penghuni', [InputController::class, 'storePenghuni'])
    ->name('input.penghuni.store');

/*
|--------------------------------------------------------------------------
| Petugas
|--------------------------------------------------------------------------
*/

Route::get('/input/petugas', function () {
    return view('input.petugas');
})->name('input.petugas');

Route::post('/input/petugas', [InputController::class, 'storePetugas'])
    ->name('input.petugas.store');


/*
|--------------------------------------------------------------------------
| Lalu Lintas
|--------------------------------------------------------------------------
*/

Route::get('/input/lalu-lintas', function () {
    return view('input.lalu_lintas');
})->name('input.lalu_lintas');

Route::post('/input/lalu-lintas', [InputController::class, 'storeLaluLintas'])
    ->name('input.lalu_lintas.store');


/*
|--------------------------------------------------------------------------
| Edit Aktivitas
|--------------------------------------------------------------------------
*/

Route::get('/edit-aktivitas', [InputController::class, 'editAktivitas'])
    ->name('input.edit_aktivitas');

Route::put('/edit-aktivitas', [InputController::class, 'bulkUpdateLaluLintas'])
    ->name('input.edit_aktivitas.bulk');