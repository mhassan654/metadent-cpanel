<?php

use App\Http\Controllers\Api\v2\CarePlanController;

Route::apiResource("care_plan", CarePlanController::class);
Route::prefix("care_plan")->group(function(){
  Route::post("get_care_plans_by_patient",[CarePlanController::class,'get_care_plans_by_patient'])->name('care_plan.get_care_plans_by_patient');
});
