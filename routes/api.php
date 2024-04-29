<?php

use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    // get user
    Route::get('user', [AuthController::class, 'fetch']);

    // update user
    Route::put('user', [AuthController::class, 'update']);

    // logout
    Route::post('logout', [AuthController::class, 'logout']);

    // create address
    Route::post('address', [AddressController::class, 'store']);

    // get address by user id
    Route::get('address', [AddressController::class, 'index']);

    // create order
    Route::post('order', [OrderController::class, 'store']);

    // get order by user id
    Route::get('order', [OrderController::class, 'index']);
});


// register
Route::post('register', [AuthController::class, 'register']);

// login
Route::post('login', [AuthController::class, 'login']);

// get banner
Route::get('banners', [BannerController::class, 'index']);

// get category
Route::get('categories', [CategoryController::class, 'index']);

// get products
Route::get('products', [ProductController::class, 'index']);

// get products by id
Route::get('products/{id}', [ProductController::class, 'show']);
