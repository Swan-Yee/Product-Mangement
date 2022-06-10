<?php

use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']],function(){
    Route::redirect('/','/product');
    Route::resource('/product', ProductController::class);
    Route::resource('/category',CategoryController::class);
    Route::resource('/sub-category',SubCategoryController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Facebook Register Login Control
Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('login', [FacebookController::class, 'loginUsingFacebook'])->name('login');
    Route::get('callback', [FacebookController::class, 'callbackFromFacebook'])->name('callback');
});

Route::prefix('google')->name('google.')->group( function(){
    Route::get('login', [GoogleController::class, 'loginUsingGoogle'])->name('login');
    Route::get('callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
});
