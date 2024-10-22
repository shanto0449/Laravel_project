<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::middleware('auth')->group(function () {
    Route::view("/","home")->name("home");
 });

Route::get('home',[HomeController::class,'home']);

Route::get('/login', [AuthController::class,'login'])->name('login');
Route::post('/login', [AuthController::class,'loginPost'])->name('login.post');

Route::get('/registration', [AuthController::class,'registration'])->name('registration');

Route::post('/registration', [AuthController::class,'registrationPost'])->name('registration.post');

Route::get('/logout', [AuthController::class,'logout'])->name('logout');


//blog route
Route::get('add-blog', [AuthController::class,'addBlog'])->name('add-blog');

Route::post('add-blog',[AuthController::class,'blogPost'])->name('blog.post');
Route::get('view-blog', [AuthController::class,'viewBlog'])->name('view-blog');

//title route
Route::get('add-title', [AuthController::class,'addTitle'])->name('add-title');
Route::post('add-title',[AuthController::class,'titlePost'])->name('title.post');
Route::get('view-title', [AuthController::class,'viewTitle'])->name('view-title');


//contact us route
Route::get('contact', [AuthController::class,'contact'])->name('contact');
Route::post('contact',[AuthController::class,'contactPost'])->name('contact.post');


//slider
Route::view('slider','slider')->name('slider');
