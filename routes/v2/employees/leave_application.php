<?php
/**
 **Created by MUWONGE HASSAN on 08/06/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://
 */
use App\Http\Controllers\Api\v2\LeaveApplicationController;

// All the translation route
// Route::resource('translations', TranslationsController::class);
// Route::get('translations', TranslationsController::class);
Route::group(['prefix' => 'leave_applications'], function () {

    // All the event route
    Route::get('/', [LeaveApplicationController::class, 'index'])->name('leave_applications.index');

    Route::post('/show', [LeaveApplicationController::class, 'show'])->name('leave_applications.show');

    // Specific event record route
    Route::post('apply', [LeaveApplicationController::class, 'store'])->name('leave_applications.store');

    // Specific event record route
    Route::post('update', [LeaveApplicationController::class, 'update'])->name('leave_applications.update');

    Route::post('delete', [LeaveApplicationController::class, 'destroy'])->name('leave_applications.delete');

    Route::post('approve', [LeaveApplicationController::class, 'approve'])->name('leave_applications.approve');

    Route::post('cancel', [LeaveApplicationController::class, 'cancel_leave'])->name('leave_applications.cancel_leave');

    Route::post('employee/leave_list', [LeaveApplicationController::class, 'leave_list'])->name('leave_applications.leave_list');

    Route::post('call-back', [LeaveApplicationController::class, 'call_back_from_leave'])->name('leave_applications.call_back_from_leave');

    Route::post('paginate', [LeaveApplicationController::class, 'paginate_employees_on_leave'])->name('leave_applications.index');

    Route::get('download-employees-on-leave-pdf', [LeaveApplicationController::class, 'download_employees_on_leave_pdf'])->name('leave_applications.download_employees_on_leave_pdf');

    Route::get('download-employees-on-leave-csv', [LeaveApplicationController::class, 'download_employees_on_leave_csv'])->name('leave_applications.download_employees_on_leave_csv');

    Route::get('download-employees-on-leave-excel', [LeaveApplicationController::class, 'download_employees_on_leave_excel'])->name('leave_applications.download_employees_on_leave_excel');

});
