<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('app');
});

// Catch-all para SPA
Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');



