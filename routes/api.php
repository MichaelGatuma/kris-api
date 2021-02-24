<?php

use App\Http\Controllers\API\PostAPIController;
use App\Http\Controllers\API\ProjectAPIController;
use App\Http\Controllers\API\PublicationAPIController;
use App\Http\Controllers\API\ResearcherAPIController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

Route::get('img', function () {
    return \Illuminate\Support\Facades\Storage::disk('api')->get('ProfilePictures/P78sAXZjz9faEgCWJjcr6MsHfZOrEnkVmJyXodaF.jpg')->path();
    $profile_path = \App\Models\User::find(104)->profPic;
    $file_path = \Illuminate\Support\Str::of($profile_path)->afterLast('/');
    $full_filePath = config('filesystems.disks.api.root').'/'.$file_path;
    return $full_filePath;
    $full_filePath = '../../kris.sensenventures.com/storage/app/public/ProfilePictures/P78sAXZjz9faEgCWJjcr6MsHfZOrEnkVmJyXodaF.jpg';
//return $full_filePath;
//    return \Illuminate\Support\Facades\Storage::disk('api')->path('');
//    $path = 'path_to_your_folder/';

    $file = File::get($full_filePath);
    $type = File::mimeType($full_filePath);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});
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
    Route::get('user/profile-image', [UserController::class, 'getUserImage']);
//    Route::post('user/logout-other-devices', [UserController::class, 'revokeAllTokens']);
//    Route::post('user/toggle-2fa', [UserController::class, 'toggle2fa']);

    Route::get('publications', [PublicationAPIController::class, 'index']);
    Route::get('publications/search', [PublicationAPIController::class, 'searchCriteria']);
    Route::get('publication/{id}', [PublicationAPIController::class, 'show']);
    Route::post('publication/{id}/request', [PublicationAPIController::class, 'requestAccess']);
    Route::post('publication/{id}/grant', [PublicationAPIController::class, 'grantAccess']);

    Route::get('projects', [ProjectAPIController::class, 'index']);
    Route::get('projects/search', [ProjectAPIController::class, 'searchCriteria']);
    Route::get('project/{id}', [ProjectAPIController::class, 'show']);
    Route::post('project/{id}/request', [ProjectAPIController::class, 'requestAccess']);
    Route::post('project/{id}/grant', [ProjectAPIController::class, 'grantAccess']);

    Route::get('researchers', [ResearcherAPIController::class, 'index']);
    Route::get('researcher/{id}', [ResearcherAPIController::class, 'show']);
    Route::get('researcher/activeProjects', [ResearcherAPIController::class, 'activeProjects']);

    Route::get('discussions', [PostAPIController::class, 'index']);
    Route::post('discussions', [PostAPIController::class, 'store']);
    Route::get('discussion/{id', [PostAPIController::class, 'show']);

    //dropdown population
    Route::get('researchareas', [\App\Http\Controllers\API\InflationController::class, 'researchAreas']);
    Route::get('institutions', [\App\Http\Controllers\API\InflationController::class, 'institutions']);
    Route::get('departments', [\App\Http\Controllers\API\InflationController::class, 'departments']);
    Route::get('funders', [\App\Http\Controllers\API\InflationController::class, 'funders']);
});

//todo: remove these endpoints
//Route::get('publications/search', [PublicationAPIController::class, 'searchCriteria']);
//Route::get('projects/search', [ProjectAPIController::class, 'searchCriteria']);
//Route::get('researchers', [ResearcherAPIController::class, 'index']);
//Route::get('researcher/{id}', [ResearcherAPIController::class, 'show']);
