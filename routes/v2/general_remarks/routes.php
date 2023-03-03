<?php

use App\Http\Controllers\Api\v2\GeneralRemarkController;
use Illuminate\Support\Facades\Route;

Route::apiResource('general_remarks', GeneralRemarkController::class);
Route::prefix("general_remarks")->group(function(){
  Route::post("all",[GeneralRemarkController::class,'allGeneralRemarks'])->name('general_remarks.view_patient_remarks');
  Route::post("archive",[GeneralRemarkController::class,'archive'])->name('general_remarks.archive_patient_remarks');
});
