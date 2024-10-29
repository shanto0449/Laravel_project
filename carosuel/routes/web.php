<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarosuelController;

Route::get('/', function () {
    return view('welcome');


});

Route::get('/carosule', [CarosuelController::class,'index']);
Route::get('/form', [CarosuelController::class,'form']);

Route::post('/create', [CarosuelController::class,'create']);

Route::get('/slider', [CarosuelController::class,'slider']);
