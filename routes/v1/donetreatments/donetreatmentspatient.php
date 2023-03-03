<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\DoneTreatmentsPatientController;

Route::prefix("donetreatments")->group(function(){

    Route::post("get_done_treatments_by_patient_side", [DoneTreatmentsPatientController::class, "get_done_treatments_by_patient_side"]);
});
