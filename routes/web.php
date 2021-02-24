<?php

use Illuminate\Support\Facades\Route;

Route::view('/','welcome');
Route::get('/user/verify/{token}', [\App\Http\Controllers\API\UserController::class, 'verifyUser']);
Route::get('/user/password-reset/{token}', [\App\Http\Controllers\API\UserController::class, 'verifyForgotPasswordToken']);
Route::post('/user/reset-password', [\App\Http\Controllers\API\UserController::class, 'resetPassword'])->name('updatePassword');

Route::get('/message', function () {
    return view('verifyEmailMessage');
});
//utility packages
Route::get('generator_builder',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');
