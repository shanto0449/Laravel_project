<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\AdminMainController;
use App\Http\Controllers\admin\ProductAttributeContorller;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\DiscountController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','rolemanager:customar'])->name('dashboard');

//Admin routs
Route::middleware(['auth', 'verified','rolemanager:admin'])->group(function () {
    Route::prefix('admin')->group(function(){
        Route::controller(AdminMainController::class)->group(function(){
            Route::get('/dashboard','index')->name('admin');
            Route::get('/settings','setting')->name('admin.setting');
            Route::get('/manage/users','manage_user')->name('admin.manage.user');
            Route::get('/manage/stores','manage_stores')->name('admin.manage.store');
            Route::get('/cart/history','cart_history')->name('admin.cart.history');
            Route::get('/order/history','order_history')->name('admin.order.history');

        });

        Route::controller(CategoryController::class)->group(function(){
            Route::get('/category/create','index')->name('category.create');
            Route::get('/category/manage','manage')->name('category.manage');

    });
    Route::controller(SubCategoryController::class)->group(function(){
        Route::get('/subcategory/create','index')->name('subcategory.create');
        Route::get('/subcategory/manage','manage')->name('subcategory.manage');

});

Route::controller(ProductController::class)->group(function(){
    Route::get('/product/manage','index')->name('product.manage');
    Route::get('/product/review/manage','review_emanage')->name('product.review.manage');

});

Route::controller(ProductAttributeContorller::class)->group(function(){
    Route::get('/productattribute/create','index')->name('productattribute.create');
    Route::get('/productattribute/manage','manage')->name('productattribute.manage');

});

Route::controller(DiscountController::class)->group(function(){
    Route::get('/discount/create','index')->name('discount.create');
    Route::get('/discount/manage','manage')->name('discount.manage');

});





});
});


Route::get('/vendor/dashboard', function () {
    return view('vendor');
})->middleware(['auth', 'verified','rolemanager:vendor'])->name('vendor');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
