<?php

//Created by Mulindwa Denis

use \Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\v2\PasswordResetController;

Route::post('reset-password',[PasswordResetController::class,'submitForgetPassword']);

Route::post('change-password',[PasswordResetController::class, 'submitResetPasswordForm']);
