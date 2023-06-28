<?php

use App\Http\Controllers\BodyMassIndexController;
use App\Http\Controllers\V1\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('auth')->group(function () {
    Route::post('register', Auth\RegisterController::class); 
    Route::post('login', Auth\LoginController::class);  
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('profile', [Auth\ProfileController::class, 'show']);
    Route::put('profile', [Auth\ProfileController::class, 'update']);
    Route::put('password-update', Auth\PasswordUpdateController::class);
    Route::post('auth/logout', Auth\LogoutController::class);
    Route::apiResource('body-mass-index', BodyMassIndexController::class);
});