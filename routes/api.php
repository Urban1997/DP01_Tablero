<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\support\HAPDPObservacionesController;
use App\Http\Controllers\API\support\HAPDPPreviosController;

Route::get('/observaciones/{ctrl_en}', [HAPDPObservacionesController::class, 'index']);
Route::get('/previos/{ctrl_en}', [HAPDPPreviosController::class, 'index']);
