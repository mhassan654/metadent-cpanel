<?php

use App\Http\Controllers\Patients\AuthPatientController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {

    //register
    Route::post('register', [AuthPatientController::class, 'register']);

    //login patient
    Route::post('login', [AuthPatientController::class, 'login']);

    //send code
    Route::post('forgot_password', [AuthPatientController::class, 'send_code']);

    Route::group(['middleware' => 'jwt.verify'], function () {
        //user info
        Route::post('info', [AuthPatientController::class, 'index']);

        //password reset
        Route::post('password_reset', [AuthPatientController::class, 'password_reset']);

        //update
        Route::post('update_info', [AuthPatientController::class, 'update_info']);

        //verification
        Route::post('verify', [AuthPatientController::class, 'verify_code']);

        //update photo
        Route::post('update_photo', [AuthPatientController::class, 'update_photo']);
    });
});
