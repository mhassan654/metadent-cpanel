<?php

use App\Http\Controllers\Api\v1\TreatmentCategoriesController;
use Illuminate\Support\Facades\Route;

Route::prefix("treatments/categories")->group(function(){

    Route::post("all", [TreatmentCategoriesController::class, "index"]);
    Route::post("list", [TreatmentCategoriesController::class, "categoriesData"]);

    Route::post("treatment", [TreatmentCategoriesController::class, "show"]);

    Route::post("create", [TreatmentCategoriesController::class, "store"]);

    Route::post("edit", [TreatmentCategoriesController::class, "update"]);

    Route::post("delete", [TreatmentCategoriesController::class, "destroy"]);
    Route::post("deleteAll/{id}", [TreatmentCategoriesController::class, "deleteCategory"]);
});
