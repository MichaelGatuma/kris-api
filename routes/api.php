<?php

use Illuminate\Support\Facades\Route;

//Route::middleware('auth:sanctum')->group(function () {
//    Route::get('user', function (Request $request) {
//        return $request->user();
//    });
//
//    Route::get('projects', function () {
//        return response()->json(\App\Models\Researchproject::first());
//    });
//
//});
//Token or Login Route

Route::post('register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::post('user/forgot-password-request', [\App\Http\Controllers\AuthController::class, 'forgotPasswordRequest']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('user/reset-password', [\App\Http\Controllers\AuthController::class, 'resetPasswordByAuth']);
    Route::post('user/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::put('user/{id}', [\App\Http\Controllers\API\UserController::class, 'edit']);
    Route::post('user/image', [\App\Http\Controllers\API\UserController::class, 'addUserImage']);
    Route::post('user/logout-other-devices', [\App\Http\Controllers\API\UserController::class, 'revokeAllTokens']);
    Route::post('user/toggle-2fa', [\App\Http\Controllers\API\UserController::class, 'toggle2fa']);

});

//Resources
Route::apiResource('publication', \App\Http\Controllers\API\PublicationAPIController::class);
