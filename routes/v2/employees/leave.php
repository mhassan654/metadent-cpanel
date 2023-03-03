<?php
/**
 **Created by MUWONGE HASSAN on 08/06/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://
 */
use App\Http\Controllers\Api\v2\LeaveController;

    // All the translation route
    // Route::resource('translations', TranslationsController::class);
    // Route::get('translations', TranslationsController::class);
    Route::group(['prefix' =>'employee_leaves'],function(){

        // All the event route
        Route::get('/', [LeaveController::class, 'index'])->name('employee_leaves.index');

        Route::post('/show', [LeaveController::class, 'show'])->name('employee_leaves.show');

        // Specific event record route
        Route::post('store', [LeaveController::class, 'store'])->name('employee_leaves.store');

         // Specific event record route
         Route::post('update', [LeaveController::class, 'update'])->name('employee_leaves.update');

         Route::post('update_status', [LeaveController::class, 'change_status'])->name('employee_leaves.change_status');

         Route::post('delete', [LeaveController::class, 'destroy'])->name('employee_leaves.delete');

    });
