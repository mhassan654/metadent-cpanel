<?php

use App\Http\Controllers\Api\v1\TreatmentsController;
use App\Http\Controllers\Api\v1\TreatmentsImporterController;
use App\Http\Controllers\Api\v2\TreatmentProcedureController;
use Illuminate\Support\Facades\Route;

Route::prefix("treatments")->group(function(){

    Route::post("all", [TreatmentsController::class, "index"]);

    Route::post("paginated/all", [TreatmentsController::class, "paginateTreatments"]);

    Route::post("treatment", [TreatmentsController::class, "show"]);

    Route::post("create", [TreatmentsController::class, "store"]);

    Route::post("edit", [TreatmentsController::class, "update"]);

    Route::post("delete", [TreatmentsController::class, "destroy"]);
    Route::post("deleteAll/{id}", [TreatmentsController::class, "deleteSelected"]);

      // treatments route for importing treatments data file
    Route::post("import", [TreatmentsImporterController::class, "import"]);

    // treatments route for exporting treatments data file
    Route::get("export", [TreatmentsImporterController::class, "export"]);

    // treatments route for fetching treatments with doctors list
    Route::post("doctors", [TreatmentsController::class, "doctorTreatments"]);

    // treatments procedures route for fetching procedures list
    Route::post("procedures", [TreatmentProcedureController::class, "treatmentWithProcedures"]);
});
