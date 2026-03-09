<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\support\HAPDPObservacionesController;
use App\Http\Controllers\API\support\HAPDPPreviosController;

// API's de SUPPORT para Tableros Laserfiche
Route::get('/observaciones/{ctrl_en}', [HAPDPObservacionesController::class, 'index']);
Route::get('/previos/{ctrl_en}', [HAPDPPreviosController::class, 'index']);


// API's de WEB para Tablero Reportes DP01
Route::get('/detalles/{ctrl}', [HAPDPPreviosController::class, 'detalles']);
