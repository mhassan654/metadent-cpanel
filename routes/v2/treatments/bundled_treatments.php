<?php
//Created by Mulindwa Denis

use App\Http\Controllers\Api\v2\BundledTreatmentsController;
use Illuminate\Support\Facades\Route;

Route::prefix('bundled_treatments')->group(function(){

    //create bundled_treatment
    Route::post('create',[BundledTreatmentsController::class, 'store'])->name('bundled_treatments.create');

    //fetch all treatments
    Route::post('all',[BundledTreatmentsController::class, 'index'])->name('bundled_treatments.index');

    //paginated
    Route::post('paginate',[BundledTreatmentsController::class, 'paginated'])->name('bundled_treatments.paginate');

    //update
    Route::post('update',[BundledTreatmentsController::class,'update'])->name('bundled_treatments.update');

    //delete
    Route::post('delete',[BundledTreatmentsController::class, 'destroy'])->name('bundled_treatments.delete');

    //search
    Route::post('search',[BundledTreatmentsController::class, 'search'])->name('bundled_treatments.search');

    //archive
    Route::post('archive',[BundledTreatmentsController::class, 'archive'])->name('bundled_treatments.archive');

    //archive all
    Route::post('archive/all',[BundledTreatmentsController::class, 'archiveAll'])->name('bundled_treatments.archive_all');

    //archive selected
    Route::post('archive/selected',[BundledTreatmentsController::class, 'archiveSelected'])->name('bundled_treatments.archive_selected');

    //restore all archived treatments
    Route::post('restore/all',[BundledTreatmentsController::class , 'restoreAll'])->name('bundled_treatments.restore_all');

    //delete all
    Route::post('delete/all',[BundledTreatmentsController::class, 'deleteAll'])->name('bundled_treatments.delete_all');

    //delete selected
    Route::post('delete/selected',[BundledTreatmentsController::class, 'deleteSelected'])->name('bundled_treatments.delete_selected');
});
