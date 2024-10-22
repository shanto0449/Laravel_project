<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminControler;

Route::get('/',[AdminControler::class,'homepage']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/home',[AdminControler::class,'index'])->name('home');
