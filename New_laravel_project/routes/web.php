<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('welcome');
});

// Route::view('list','blog-list');
Route::view('add','add-blog');

Route::post('add',[BlogController::class,'addBlog']);

Route::get('list',[BlogController::class,'list']);

Route::get('delete/{id}',[BlogController::class,'delete']);

Route::get('edit/{slug}',[BlogController::class,'edit']);

Route::put('edit-blog/{slug}',[BlogController::class,'editBlog']);

Route::get('view/{slug}',[BlogController::class,'viewBlog']);
