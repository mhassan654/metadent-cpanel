<?php
/**
 **Created by MUWONGE HASSAN on 24/02/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */

use App\Http\Controllers\Api\v2\TreatmentProcedureController;

Route::prefix("treatmentprocedures")->group(function(){

    Route::post("all", [TreatmentProcedureController::class, "index"])->name('treatment_procedures.index');

    Route::post("show", [TreatmentProcedureController::class, "treatmentWithProcedures"])->name('treatment_procedures.show');

    Route::post("create", [TreatmentProcedureController::class, "store"])->name('treatment_procedures.create');

    Route::post("delete", [TreatmentProcedureController::class, "destroy"])->name('treatment_procedures.delete');

    Route::post("procedures", [TreatmentProcedureController::class, "treatmentWithProcedures"])->name('treatment_procedures.procedures');
});
