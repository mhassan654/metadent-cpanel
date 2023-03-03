<?php

use App\Http\Controllers\Api\v1\EndondoticTreatmentResultController;
use Illuminate\Support\Facades\Route;

Route::apiResource('endodontic_treatment_results', EndondoticTreatmentResultController::class);
Route::prefix("endodontic_treatment_results")->group(function(){
  Route::post("all",[EndondoticTreatmentResultController::class,'all']);
  Route::post("archive",[EndondoticTreatmentResultController::class,'archive']);
});
