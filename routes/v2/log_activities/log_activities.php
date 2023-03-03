<?php
//Created by Mulindwa Denis

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v2\LogActivityController;

Route::prefix('log-activities')->group(function () {

    // patient logs
    Route::post('patient-logs', [LogActivityController::class, 'patient_logs'])->name('log_activities.view_patient_logs');

    // user system logs
    Route::post('user-system-logs', [LogActivityController::class, 'user_system_logs'])->name('log_activities.view_user_system_logs');

    // user auth logs
    Route::post('user-auth-logs', [LogActivityController::class, 'user_auth_logs'])->name('log_activities.view_user_auth_logs');

    //user logs pdf
    Route::get('download-user-pdf', [LogActivityController::class, 'download_user_activities_pdf'])->name('log_activities.download_user_activities_pdf');

    //user logs excel
    Route::get('download-user-excel', [LogActivityController::class, 'download_user_activities_excel'])->name('log_activities.download_user_activities_excel');

    //user logs excel
    Route::get('download-user-csv', [LogActivityController::class, 'download_user_activities_csv'])->name('log_activities.download_user_activities_csv');

    // download patient activities pdf
    Route::get('download-patient-pdf', [LogActivityController::class, 'patient_activities_download_pdf'])->name('log_activities.patient_activities_download_pdf');

    // download patient activities excel
    Route::get('download-patient-excel', [LogActivityController::class, 'patient_activities_download_excel'])->name('log_activities.patient_activities_download_excel');

    // download patient activities csv
    Route::get('download-patient-csv', [LogActivityController::class, 'patient_activities_download_csv'])->name('log_activities.patient_activities_download_csv');

});
