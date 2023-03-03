<?php

use App\Http\Controllers\Api\v1\DoneTreatmentsController;
use Illuminate\Support\Facades\Route;

Route::prefix("donetreatments")->group(function(){
    Route::post("all", [DoneTreatmentsController::class, "index"]);

    Route::post("create", [DoneTreatmentsController::class, "store"]);

    Route::post("edit", [DoneTreatmentsController::class, "update"]);

    Route::post("delete", [DoneTreatmentsController::class, "destroy"]);

    Route::post("get_last_done_treatments", [DoneTreatmentsController::class, "get_last_done_treatments"]);

    Route::post("get_patient_treatment_dates", [DoneTreatmentsController::class, "get_patient_treatment_dates"]);

    Route::post("get_done_treatments_by_patient", [DoneTreatmentsController::class, "get_done_treatments_by_patient"]);

    Route::post("get_done_treatments_by_patient_and_date", [DoneTreatmentsController::class, "get_done_treatments_by_patient_and_date"]);
});
