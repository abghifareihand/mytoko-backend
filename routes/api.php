<?php

use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\CallbackController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ReviewController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    // get user
    Route::get('user', [AuthController::class, 'fetch']);

    // update user
    Route::put('user', [AuthController::class, 'update']);

    // logout
    Route::post('logout', [AuthController::class, 'logout']);

    // crud cart
    Route::apiResource('cart', CartController::class);

    // crud order
    Route::apiResource('order', OrderController::class);

    // crud address
    Route::apiResource('address', AddressController::class);

    // crud favorite
    // Route::apiResource('favorite', FavoriteController::class);
    Route::get('favorite', [FavoriteController::class, 'index']);
    Route::post('favorite', [FavoriteController::class, 'favorite']);

    // get products
    Route::get('products', [ProductController::class, 'index']);

    // get products by id
    Route::get('products/{id}', [ProductController::class, 'show']);


    Route::apiResource('reviews', ReviewController::class);
});

// register
Route::post('register', [AuthController::class, 'register']);

// login
Route::post('login', [AuthController::class, 'login']);

// get banner
Route::get('banners', [BannerController::class, 'index']);

// get category
Route::get('categories', [CategoryController::class, 'index']);

// get category by id
Route::get('categories/{id}', [CategoryController::class, 'show']);

// callback midtrans
Route::post('callback', [CallbackController::class, 'callback']);
