<?php

use App\Http\Controllers\CitasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/citas', [CitasController::class, 'index'])
        ->name('ver-citas');

    Route::delete('/cita/{cita}', [CitasController::class, 'destroy'])
        ->name('anular-cita');

    Route::get('/cita/create', [CitasController::class, 'create'])
        ->name('crear-cita-compania');

    Route::get('/cita/create/{compania}', [CitasController::class, 'createEspecialidad'])
        ->name('crear-cita-especialidad');

    Route::get('/cita/create/{compania}/{especialidad}', [CitasController::class, 'createEspecialista'])
        ->name('crear-cita-especialista');

    Route::get('/cita/create/{compania}/{especialidad}/{especialista}', [CitasController::class, 'createFechaHora'])
        ->name('crear-cita-fecha-hora');
});
