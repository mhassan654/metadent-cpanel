<?php

use App\Http\Controllers\Api\v1\DoneTreatmentsController;
use Illuminate\Support\Facades\Route;

Route::prefix("donetreatments")->group(function () {
    Route::post("all", [DoneTreatmentsController::class, "index"]);

    Route::post("create", [DoneTreatmentsController::class, "store"]);

    Route::post("edit", [DoneTreatmentsController::class, "update"]);

    Route::post("get_last_done_treatments", [DoneTreatmentsController::class, "get_last_done_treatments"]);

    Route::post("get_done_treatments_by_patient", [DoneTreatmentsController::class, "get_done_treatments_by_patient"]);

    Route::post("recent_treatments", [DoneTreatmentsController::class, 'recent_treatments']);

    Route::post("reports", [DoneTreatmentsController::class, 'done_treatments_report']);

    Route::post('patient-treatments', [DoneTreatmentsController::class, 'patient_treatments']);

    Route::post('doctor-treatments', [DoneTreatmentsController::class, 'doctor_treatments']);

    Route::get("download-pdf", [DoneTreatmentsController::class, "download_pdf"]);

    Route::get("download-csv", [DoneTreatmentsController::class, "download_csv"]);

    Route::get("download-excel", [DoneTreatmentsController::class, "download_excel"]);

    Route::get("download-patient-pdf", [DoneTreatmentsController::class, "download_patient_treatments_pdf"]);

    Route::get("download-patient-csv", [DoneTreatmentsController::class, "download_patient_treatments_csv"]);

    Route::get("download-patient-excel", [DoneTreatmentsController::class, "download_patient_treatments_excel"]);
});
