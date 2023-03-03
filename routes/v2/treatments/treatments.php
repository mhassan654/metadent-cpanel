<?php
/**
 **Created by MUWONGE HASSAN on 21/01/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */

use App\Http\Controllers\Api\v2\TreatmentsImportController;
use App\Http\Controllers\Api\v2\TreatmentsController;
use Illuminate\Support\Facades\Route;

Route::prefix("treatments")->group(function(){

    Route::post("all", [TreatmentsController::class, "index"])->name('treatments.index');

    Route::post("categories", [TreatmentsController::class, "categoryTreatments"])->name('treatments.categories');

    Route::post("paginated/all", [TreatmentsController::class, "paginateTreatments"])->name('treatments.paginated');

    Route::post("treatment", [TreatmentsController::class, "show"])->name('treatments.treatment');

    Route::post("create", [TreatmentsController::class, "store"])->name('treatments.create');

    Route::post("edit", [TreatmentsController::class, "update"])->name('treatments.edit');

    Route::post("delete", [TreatmentsController::class, "destroy"])->name('treatments.delete');

    Route::post("deleteAll/{id}", [TreatmentsController::class, "deleteSelected"])->name('treatments.delete_all');

    // treatments route for importing treatments data file
    Route::post("import", [TreatmentsImportController::class, "import"])->name('treatments.import');

    // treatments route for exporting treatments data file
    Route::get("export", [TreatmentsImportController::class, "export"])->name('treatments.export');

    // treatments route for fetching treatments with doctors list
    Route::post("doctors", [TreatmentsController::class, "doctorTreatments"])->name('treatments.treatment_doctors');
});
