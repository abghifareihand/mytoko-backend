<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    // get user
    Route::get('user', [AuthController::class, 'get']);

    // update user
    Route::put('user', [AuthController::class, 'update']);

    // update profile
    Route::post('update-profile', [AuthController::class, 'updateProfile']);

    // logout
    Route::post('logout', [AuthController::class, 'logout']);
});


// register
Route::post('register', [AuthController::class, 'register']);

// login
Route::post('login', [AuthController::class, 'login']);
