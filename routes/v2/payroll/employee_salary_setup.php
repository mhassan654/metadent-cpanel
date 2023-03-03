<?php
/**
 **Created by MUWONGE HASSAN on 08/06/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://
 */
use App\Http\Controllers\Api\v2\EmployeeSalarySetupController;

Route::group(['prefix' => 'employee_salary_setup'], function () {

    // All the event route
    Route::get('/', [EmployeeSalarySetupController::class, 'index'])->name('employee_salary_setup.index');

    Route::post('/create', [EmployeeSalarySetupController::class, 'store'])->name('employee_salary_setup.create');

    // Specific event record route
    Route::post('check_in', [EmployeeSalarySetupController::class, 'check_in'])->name('employee_salary_setup.check_in');

    Route::post('check_out', [EmployeeSalarySetupController::class, 'check_out'])->name('employee_salary_setup.check_out');

    Route::post('bulk-upload', [EmployeeSalarySetupController::class, 'import'])->name('employee_salary_setup.bulk_upload');

});
