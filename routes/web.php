<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaquetesController;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\PaqueteController;

Route::get('/agregar-paquete', [PaqueteController::class, 'create']);
Route::post('/agregar-paquete', [PaqueteController::class, 'store']);


Route::get('/', [PaquetesController::class, 'index']);

