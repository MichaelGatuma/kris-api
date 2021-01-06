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

Route::post('user/register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('user/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::post('user/forgot-password-request', [\App\Http\Controllers\AuthController::class, 'forgotPasswordRequest']);
//Route::post('user/reset-password', [\App\Http\Controllers\AuthController::class, 'resetPasswordByAuth']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('user', [\App\Http\Controllers\API\UserController::class, 'details']);
    Route::post('user/reset-password', [\App\Http\Controllers\AuthController::class, 'resetPasswordByAuth']);
    Route::post('user/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('user/delete-account', [\App\Http\Controllers\API\UserController::class, 'deleteAccount']);
    Route::post('user/profile-details', [\App\Http\Controllers\API\UserController::class, 'edit']);
    Route::post('user/profile-image', [\App\Http\Controllers\API\UserController::class, 'addUserImage']);
//    Route::post('user/logout-other-devices', [\App\Http\Controllers\API\UserController::class, 'revokeAllTokens']);
//    Route::post('user/toggle-2fa', [\App\Http\Controllers\API\UserController::class, 'toggle2fa']);
});

//Resources
Route::apiResource('publication', \App\Http\Controllers\API\PublicationAPIController::class);
Route::apiResource('project', \App\Http\Controllers\API\ProjectAPIController::class);
Route::apiResource('researcher', \App\Http\Controllers\API\ResearcherAPIController::class);
Route::apiResource('discussion', \App\Http\Controllers\API\PostAPIController::class);
