<?php
/**
 **Created by MUWONGE HASSAN on 21/05/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */
use App\Http\Controllers\Api\v2\TreatmentTypesController;
Route::group(['prefix' =>'treatment-types'],function(){

    // All the event route
    Route::post('all', [TreatmentTypesController::class, 'index'])->name('treatment_types.index');

    // Specific event record route
    Route::post('type', [TreatmentTypesController::class, 'show'])->name('treatment_types.type');

    // Create new event record route
    Route::post('create', [TreatmentTypesController::class, 'store'])->name('treatment_types.create');

    // Create new event record route
    Route::post('update', [TreatmentTypesController::class, 'update'])->name('treatment_types.update');

    // Create new event record route
    Route::post('delete', [TreatmentTypesController::class, 'destroy'])->name('treatment_types.delete');

    Route::post('restore-all', [TreatmentTypesController::class, 'restoreAll'])->name('treatment_types.restore_all');
});
