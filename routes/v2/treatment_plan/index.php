<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v2\TreatmentPlanController;

Route::prefix("treatment_plan")->middleware(['api'])->group(function(){
  Route::post("get_treatment_plans_by_patient",[TreatmentPlanController::class,'get_treatment_plans_by_patient'])->name('treatment_plan.view_treatment_plans_by_patient');
});
Route::apiResource("treatment_plan", TreatmentPlanController::class, ['middleware' => ['api', 'permission.access']]);
