<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;

Route::redirect('/','/product');
Route::resource('/product', ProductController::class);
Route::resource('/category',CategoryController::class);
Route::resource('/sub-category',SubCategoryController::class);
