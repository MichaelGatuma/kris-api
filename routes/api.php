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
    Route::post('user/reset-password', 'API\UserController@resetPasswordByAuth');
    Route::post('user/logout', 'API\UserController@logout');
    Route::put('user/{id}', 'API\UserController@edit');
    Route::post('user/image', 'API\ImageController@addUserImage');
    Route::post('user/logout-other-devices', 'API\UserController@revokeAllTokens');
    Route::post('user/toggle-2fa', 'API\UserController@toggle2fa');

});
