<?php
/**
 **Created by MUWONGE HASSAN on 08/06/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://
 */
use App\Http\Controllers\Api\v2\LeaveTypeController;

// All the translation route
// Route::resource('translations', TranslationsController::class);
// Route::get('translations', TranslationsController::class);
Route::group(['prefix' => 'leave_types'], function () {

    // All the event route
    Route::get('/', [LeaveTypeController::class, 'index'])->name('leave_types.index');

    Route::post('/show', [LeaveTypeController::class, 'show'])->name('leave_types.show');

    // Specific event record route
    Route::post('store', [LeaveTypeController::class, 'store'])->name('leave_types.store');

    // Specific event record route
    Route::post('update', [LeaveTypeController::class, 'update'])->name('leave_types.update');

    Route::post('delete', [LeaveTypeController::class, 'destroy'])->name('leave_types.delete');

    Route::post('approve', [LeaveTypeController::class, 'approve'])->name('leave_types.approve');

    Route::post('employee-leave-types', [LeaveTypeController::class, 'employee_leave_types'])->name('leave_types.employee_leave_types');

});
