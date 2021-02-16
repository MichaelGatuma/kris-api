<?php

use App\Http\Controllers\API\PostAPIController;
use App\Http\Controllers\API\ProjectAPIController;
use App\Http\Controllers\API\PublicationAPIController;
use App\Http\Controllers\API\ResearcherAPIController;
use App\Http\Controllers\API\UserController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;

//todo: dropdown population


//research areas
//research institutions
//department
//funder

//todo: project search criteria

Route::post('user/register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('user/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::post('user/forgot-password-request', [\App\Http\Controllers\AuthController::class, 'forgotPasswordRequest']);
//Route::post('user/reset-password', [\App\Http\Controllers\AuthController::class, 'resetPasswordByAuth']);

Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::get('user', [UserController::class, 'details']);
    Route::post('user/reset-password', [\App\Http\Controllers\AuthController::class, 'resetPasswordByAuth']);
    Route::post('user/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('user/delete-account', [UserController::class, 'deleteAccount']);
    Route::post('user/profile-details', [UserController::class, 'edit']);
    Route::post('user/profile-image', [UserController::class, 'addUserImage']);
    Route::get('user/profile-image', [UserController::class, 'getUserImage']);
    Route::get('user/profile-image/{user_id}', [UserController::class, 'getUserImage']);
//    Route::post('user/logout-other-devices', [UserController::class, 'revokeAllTokens']);
//    Route::post('user/toggle-2fa', [UserController::class, 'toggle2fa']);

    Route::get('publications', [PublicationAPIController::class, 'index']);
    Route::get('publication/{id}', [PublicationAPIController::class, 'show']);
    Route::post('publication/{id}/request', [PublicationAPIController::class, 'requestAccess']);
    Route::post('publication/{id}/grant', [PublicationAPIController::class, 'grantAccess']);

    Route::get('projects', [ProjectAPIController::class, 'index']);
    Route::get('project/{id}', [ProjectAPIController::class, 'show']);
    Route::post('project/{id}/request', [ProjectAPIController::class, 'requestAccess']);
    Route::post('project/{id}/grant', [ProjectAPIController::class, 'grantAccess']);

    Route::get('researchers', [ResearcherAPIController::class, 'index']);
    Route::get('researcher/{id}', [ResearcherAPIController::class, 'show']);
    Route::get('researcher/activeProjects', [ResearcherAPIController::class, 'activeProjects']);

    Route::get('discussions', [PostAPIController::class, 'index']);
    Route::post('discussions', [PostAPIController::class, 'store']);
    Route::get('discussion/{id', [PostAPIController::class, 'show']);
});
