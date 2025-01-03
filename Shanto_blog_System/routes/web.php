<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::group(['as'=>'admin.','prefix'=> 'admin','namespace'=>'Admin','middleware'=> ['auth','admin']], function () {
    Route::get('/dashboard','DashboardController@index')->name('dashboard');

});

Route::group(['as'=>'author.','prefix'=> 'author','namespace'=>'Author','middleware'=> ['auth','author']], function () {
    Route::get('/dashboard','DashboardController@index')->name('dashboard');

});
