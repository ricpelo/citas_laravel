<?php

use App\Http\Controllers\CitasController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
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
    if (Auth::user()->esEspecialista()) {
        return view('dashboard-especialista');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard-especialista', function () {
    Gate::authorize('dashboard-especialista');
    return view('dashboard-especialista');
})->middleware(['auth'])->name('dashboard-especialista');

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

    Route::get('/cita/create/{compania}/{especialidad}/{especialista:id}', [CitasController::class, 'createFechaHora'])
        ->where('especialista', '[0-9]+')
        ->name('crear-cita-fecha-hora');

    Route::get('/cita/create/{compania}/{cita}/confirmar', [CitasController::class, 'createConfirmar'])
        ->name('crear-cita-confirmar');

    Route::post('/cita/create/{compania}/{cita}/confirmar', [CitasController::class, 'storeConfirmar'])
        ->name('store-cita-confirmar');
});
