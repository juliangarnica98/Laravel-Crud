<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VueloController;
use App\Http\Controllers\PasajeroController;
use App\Http\Controllers\RutaController;
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

Route::get('/',[RutaController::class, 'index'])->name('ruta.index');
//rutas index
Route::get('ruta',[RutaController::class, 'index'])->name('ruta.index');
Route::get('pasajero',[PasajeroController::class, 'index'])->name('pasajero.index');
Route::get('vuelo',[VueloController::class, 'index'])->name('vuelo.index');
//listar con ajax
Route::get('tablaruta',[RutaController::class, 'listar'])->name('ruta.listar');
//insertar
Route::post('agregarruta',[RutaController::class, 'store'])->name('ruta.agregar');
