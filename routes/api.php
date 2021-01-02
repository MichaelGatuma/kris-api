<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', function (Request $request) {
        return $request->user();
    });

    Route::get('projects', function () {
        return response()->json(\App\Models\Researchproject::first());
    });

});
//Token or Login Route
Route::post('token', [\App\Http\Controllers\AuthController::class, 'requestToken']);
Route::post('register', [\App\Http\Controllers\AuthController::class, 'registerUser']);



