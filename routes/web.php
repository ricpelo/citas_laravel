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

Route::get('/citas', [CitasController::class, 'index'])
    ->middleware(['auth'])->name('ver-citas');

Route::get('/cita/create', [CitasController::class, 'create'])
    ->middleware(['auth'])->name('crear-cita');
