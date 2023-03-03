<?php
/**
 **Created by MUWONGE HASSAN on 10/05/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */

use App\Http\Controllers\Api\v2\AdhesiveTypesController;

Route::group(['prefix' => 'adhesive_types', 'middleware' => ['api']], function () {

    // All the event route
    Route::post('all', [AdhesiveTypesController::class, 'index'])->name('adhesive_types.index');

    // Specific event record route
    Route::post('type', [AdhesiveTypesController::class, 'show'])->name('adhesive_types.show');

    // Create new event record route
    Route::post('create', [AdhesiveTypesController::class, 'store'])->name('adhesive_types.create');

    // Create new event record route
    Route::post('update', [AdhesiveTypesController::class, 'update'])->name('adhesive_types.update');

    // Create new event record route
    Route::post('delete', [AdhesiveTypesController::class, 'destroy'])->name('adhesive_types.delete');

    Route::post('restore-all', [AdhesiveTypesController::class, 'restoreAll'])->name('adhesive_types.restore_all');
});
