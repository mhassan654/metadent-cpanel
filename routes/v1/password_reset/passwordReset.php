<?php
/**
 **Created by MUWONGE HASSAN on 08/03/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */
//Route::prefix("reset")->group(function(){

        Route::post('reset-password', [\App\Http\Controllers\Api\v1\PasswordResetController::class, "submitForgetPassword"]);

        Route::post('change-password', [\App\Http\Controllers\Api\v1\PasswordResetController::class, "submitResetPasswordForm"]);
//});
