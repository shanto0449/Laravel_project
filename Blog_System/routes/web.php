<?php

use App\Http\Controllers\Author\AuthorDashboardController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use  App\Http\Controllers\Author\AuthPostController;
use  App\Http\Controllers\Author\AuthorSetingsController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\SubcriberController;
use App\Http\Controllers\Admin\AdminSubcriberController;
use App\Http\Controllers\Admin\setingsController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\Admin\AdminFavoriteController;
use App\Http\Controllers\Author\AuthorFavoriteController;
use App\Http\Controllers\CsPostController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\Admin\AdminCommentsController;
use App\Http\Controllers\Author\AuthorCommentController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\SecarchController;
use App\Http\Controllers\CsAuthorControler;
use Illuminate\Support\Facades\View; // Import View facade
 // Import Category model

Route::get('/',[HomeController::class,'index']
)->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route::get('/home','HomeController@index')->name('home');

// Route::group(['as'=>'admin.','prefix'=> 'admin','namespace'=>'Admin','middleware'=> ['auth','admin']], function () {
//     Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');;


// });

// Route::group(['as'=>'author.','prefix'=> 'author','namespace'=>'Author','middleware'=> ['auth','author']], function () {
//     Route::get('/dashboard',[AuthorDashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');;


// });

Route::group(['middleware'=>['auth']],function(){
  Route::post('favorite/{post}/add',[FavoriteController::class,'add'])->name('post.favorite');

  Route::post('comment/{post}',[CommentsController::class,'store'])->name('comment.store');
});


Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('settings',[setingsController::class,'index'])->name('settings.index');
    Route::put('profile-update',[setingsController::class,'updateProfile'])->name('profile.update');
    Route::put('password-update',[setingsController::class,'updatePassword'])->name('password.update');


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('tag', TagController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('post', PostController::class);

    Route::get('pending/post', [PostController::class, 'pending'])->name('post.pending');

    Route::put('/post/{id}/approve', [PostController::class, 'approve'])->name('post.approve');

    Route::get('/authors',[AuthorController::class,'index'])->name('author.index');
    Route::delete('authors/{id}',[AuthorController::class,'destroy'])->name('author.destroy');

    Route::get('/favorite',[AdminFavoriteController::class,'index'])->name('favorite.index');

    Route::get('comments',[AdminCommentsController::class,'index'])->name('comment.index');
    Route::delete('comments/{id}',[AdminCommentsController::class,'destory'])->name('comment.destory');

    Route::get('/subscriber',[AdminSubcriberController::class,'index'])->name('subscriber.index');
    Route::delete('/subscriber/{subscriber}',[AdminSubcriberController::class,'destroy'])->name('subscriber.destroy');
});

Route::group(['as'=>'author.','prefix'=> 'author','middleware'=> ['auth','author']], function () {
    Route::get('/dashboard',[AuthorDashboardController::class,'index'])->name('dashboard');
    Route::resource('post', AuthPostController::class);

    Route::get('settings',[AuthorSetingsController::class,'index'])->name('settings.index');
    Route::put('profile-update',[AuthorSetingsController::class,'updateProfile'])->name('profile.update');
    Route::put('password-update',[AuthorSetingsController::class,'updatePassword'])->name('password.update');

    Route::get('comments',[AuthorCommentController::class,'index'])->name('comment.index');
    Route::delete('comments/{id}',[AuthorCommentController::class,'destory'])->name('comment.destory');

    Route::get('/favorite',[AuthorFavoriteController::class,'index'])->name('favorite.index');

});


Route::get('subscriber',[SubcriberController::class,'store'])->name('subscriber.stre');

Route::get('post/{slug}',[CsPostController::class,'details'])->name('post.details');
Route::get('posts',[CsPostController::class,'index'])->name('post.index');
Route::get('category/{slug}',[CsPostController::class,'postByCategory'])->name('categoty.posts');

Route::get('tag/{slug}',[CsPostController::class,'postByTag'])->name('tag.posts');
Route::get('/search',[SecarchController::class,'search'])->name('search');

Route::get('/profile/{username}',[CsAuthorControler::class,'profile'])->name('author.profile');


view::composer('layouts.frontend.partial.footer',function($view){
  $categories = Category::all();
  $view->with('categories',$categories);
});
