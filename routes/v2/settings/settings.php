<?php
/**
 **Created by MUWONGE HASSAN on 08/06/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */
use App\Http\Controllers\Api\v2\SettingController;

// All the translation route
Route::group(['prefix' => 'settings'], function () {
    //    Route::group(['prefix' => 'settings', 'middleware' => ['role:Super-Admin']], function () {

    Route::post('update', [SettingController::class, 'store']);
    Route::post('update2', [SettingController::class, 'update']);

    Route::post('all', [SettingController::class, 'index']);

    Route::post('language', [SettingController::class, 'languageCode']);

//    Route::middleware(['role:Super-Admin'])->group(function () {
        Route::post('generalSettings', [SettingController::class, 'generalSettings']);
        Route::post('update-smtp-settings', [SettingController::class, 'smtpSettings']);
        Route::post('update-mollie-settings', [SettingController::class, 'MollieConfigs']);
        Route::get('smtp-settings', [SettingController::class, 'SMTP']);
        Route::get('mollie-settings', [SettingController::class, 'Mollie']);
        Route::get('azure-settings', [SettingController::class, 'azure']);
        Route::get('system-error-logs', [SettingController::class, 'errorLogs']);
        Route::post('update-log-channel', [SettingController::class, 'updateLogChannel']);
//    }
//    );

});
