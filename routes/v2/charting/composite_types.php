<?php
/**
 **Created by MUWONGE HASSAN on 10/05/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */
use App\Http\Controllers\Api\v2\CompositeTypesController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'composite_type', 'middleware' => ['api']], function () {

    // All the event route
    Route::post('all', [CompositeTypesController::class, 'index'])->name('composite_type.index');

    // Specific event record route
    Route::post('type', [CompositeTypesController::class, 'show'])->name('composite_type.show');

    // Create new event record route
    Route::post('create', [CompositeTypesController::class, 'store'])->name('composite_type.store');

    // Create new event record route
    Route::post('update', [CompositeTypesController::class, 'update'])->name('composite_type.update');

    // Create new event record route
    Route::post('delete', [CompositeTypesController::class, 'destroy'])->name('composite_type.delete');

    Route::post('restore-all', [CompositeTypesController::class, 'restoreAll'])->name('composite_type.restore_all');
});
