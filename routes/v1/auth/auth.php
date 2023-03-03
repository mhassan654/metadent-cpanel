<?php
// Authentication and validation routes section

use App\Http\Controllers\Api\v1\AuthenticationController;
use Illuminate\Support\Facades\Route;
Route::group(['prefix' =>'auth', 'middleware' => ['api']],function(){
    // Login route
    Route::post("login", [AuthenticationController::class, "login"])->middleware("api");

    Route::group(['middleware' => ['auth:api']], function () {

        // Check authenticated user route
        Route::get('me', [AuthenticationController::class, 'me']);

        // Refresh authenticated user token route
        Route::post('refresh', [AuthenticationController::class, 'refresh']);

        // Logout user route
        Route::post('logout', [AuthenticationController::class, "destroy"]);

//        Route::post('reset-password', [AuthenticationController::class, "submitForgetPassword"]);
//
//        Route::post('change-password', [AuthenticationController::class, "submitResetPasswordForm"]);
    });
});
