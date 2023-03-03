<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OtherSpecifiedTreatmentsController;

Route::prefix("treatments/nonspecified")->group(function(){

    Route::post("all", [OtherSpecifiedTreatmentsController::class, "index"])->name('treatments_nonspecified.index');

    Route::post("list", [OtherSpecifiedTreatmentsController::class, "categoriesData"])->name('treatments_nonspecified.list');

    Route::post("treatment", [OtherSpecifiedTreatmentsController::class, "show"])->name('treatments_nonspecified.treatment');

    Route::post("create", [OtherSpecifiedTreatmentsController::class, "store"])->name('treatments_nonspecified.create');

    Route::post("update/{id}", [OtherSpecifiedTreatmentsController::class, "update"])->name('treatments_nonspecified.update');

    Route::post("delete/{id}", [OtherSpecifiedTreatmentsController::class, "destroy"])->name('treatments_nonspecified.delete');

    Route::post("deleteAll/{id}", [OtherSpecifiedTreatmentsController::class, "deleteCategory"])->name('treatments_nonspecified.delete_all');

    Route::post("treatment-list", [OtherSpecifiedTreatmentsController::class, "categoryTreatments"])->name('treatments_nonspecified.treatment_list');
});
