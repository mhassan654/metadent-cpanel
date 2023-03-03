<?php

use App\Http\Controllers\Api\v2\TreatmentCategoriesController;
use Illuminate\Support\Facades\Route;

Route::prefix("treatments/categories")->group(function(){

    Route::post("all", [TreatmentCategoriesController::class, "index"])->name('treatment_categories.index');

    Route::post("list", [TreatmentCategoriesController::class, "categoriesData"])->name('treatment_categories.list');

    Route::post("treatment", [TreatmentCategoriesController::class, "show"])->name('treatment_categories.treatment');

    Route::post("create", [TreatmentCategoriesController::class, "store"])->name('treatment_categories.create');

    Route::post("edit", [TreatmentCategoriesController::class, "update"])->name('treatment_categories.edit');

    Route::post("delete", [TreatmentCategoriesController::class, "destroy"])->name('treatment_categories.delete');

    Route::post("deleteAll/{id}", [TreatmentCategoriesController::class, "deleteCategory"])->name('treatment_categories.delete_all');

    Route::post("treatment-list", [TreatmentCategoriesController::class, "categoryTreatments"])->name('treatment_categories.treatment_list');
});
