<?php
/**
 **Created by MUWONGE HASSAN on 08/06/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://
 */
use App\Http\Controllers\Api\v2\AttendanceHistoryController;

// All the translation route
// Route::resource('translations', TranslationsController::class);
// Route::get('translations', TranslationsController::class);
Route::group(['prefix' => 'employees/attendances'], function () {

    // All the event route
    Route::get('/history', [AttendanceHistoryController::class, 'index'])->name('employees_attendances.history');

    Route::post('/show', [AttendanceHistoryController::class, 'show'])->name('employees_attendances.show');

    // Specific event record route
    Route::post('check_in', [AttendanceHistoryController::class, 'check_in'])->name('employees_attendances.check_in');

    Route::post('check_out', [AttendanceHistoryController::class, 'check_out'])->name('employees_attendances.check_out');

    Route::post('bulk-upload', [AttendanceHistoryController::class, 'import'])->name('employees_attendances.import');

    Route::get('download', [AttendanceHistoryController::class, 'download'])->name('employees_attendances.download');

    Route::post('employee-monthly', [AttendanceHistoryController::class, 'get_employee_monthly_attendance'])->name('employees_attendances.view_monthly_attendance');

    Route::post('employee-data', [AttendanceHistoryController::class, 'get_employee_attendance'])->name('employees_attendances.view_employee_attendance');

    Route::post('date-wise', [AttendanceHistoryController::class,'attendanceHistoryDatewise'])->name('employees_attendances.history_date_wise');

    Route::post('lateness', [AttendanceHistoryController::class, 'lateness'])->name('employees_attendances.lateness');

    Route::post('missing', [AttendanceHistoryController::class, 'missing'])->name('employees_attendances.missing');

    // Specific event record route
    Route::post('update', [AttendanceHistoryController::class, 'update'])->name('employees_attendances.update');

    Route::post('update_status', [AttendanceHistoryController::class, 'change_status'])->name('employees_attendances.update_status');

    Route::post('delete', [AttendanceHistoryController::class, 'destroy'])->name('employees_attendances.delete');

});
