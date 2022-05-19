<?php

use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\CategoryController;
use App\Http\Controllers\api\v1\ProductController;
use Illuminate\Support\Facades\Route;

Route::post('v1/register' , [AuthController::class, 'register'] );
Route::post('v1/login' , [AuthController::class, 'login'] );

    Route::middleware(['auth:sanctum'])->prefix('v1')->group(function(){
        Route::apiResource('product',ProductController::class);
        Route::apiResource('category',CategoryController::class);
        Route::apiResource('sub-category',CategoryController::class);
        Route::post('/logout' , [AuthController::class, 'logout'] );
    });
