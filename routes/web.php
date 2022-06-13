<?php

use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\OperationSystemController;
use App\Http\Controllers\ProcessorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Whoops\Run;

Route::group(['middleware' => ['auth']],function(){
    Route::redirect('/','/product');
    Route::resource('/product', ProductController::class);
    Route::resource('/category',CategoryController::class);
    Route::resource('/sub-category',SubCategoryController::class);
    Route::resource('/brand',BrandController::class);
    Route::resource('/os',OperationSystemController::class);
    Route::resource('processor', ProcessorController::class);
    Route::resource('color', ColorController::class);
    Route::resource('/phone',PhoneController::class);
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
