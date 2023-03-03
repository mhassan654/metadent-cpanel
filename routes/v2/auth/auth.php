<?php

/**
 **Created by MUWONGE HASSAN on 21/01/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */

use App\Http\Controllers\SmsController;
use App\Http\Controllers\Api\v2\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth', 'middleware' => ['api']], function () {

    Route::post("login", [AuthenticationController::class, "two_factor_login"]);

    Route::post("otp/send", [AuthenticationController::class, "send_phone_otp"]);

    // Route::post('2fa', [TwoFAController::class, "store"]);

    Route::post('2fa', [AuthenticationController::class, "verify_2fa_and_login"]);

    // Route::post('verify/{code}', [\App\Http\Controllers\Api\v2\VerificationController::class, "verification_confirmation"]);

    Route::group(['middleware' => ['api']], function () {

        // Check authenticated user route
        Route::get('me', [AuthenticationController::class, 'me']);

        // Refresh authenticated user token route
        Route::post('refresh', [AuthenticationController::class, 'refresh']);

        // Logout user route
        Route::post('logout', [AuthenticationController::class, "destroy"]);
    });
    Route::post('verify-email', [AuthenticationController::class, "verify"]);

    Route::post("test_qr_code_email", [AuthenticationController::class, "test_qr_code"]);

});

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();

//     return response()->json('email verified');
// })->middleware(['auth', 'signed'])->name('verification.verify');
