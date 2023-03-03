<?php
/**
 **Created by MUWONGE HASSAN on 08/06/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://
 */
use App\Http\Controllers\Api\v2\PayrollController;

Route::group(['prefix' => 'salary_sheet_generator'], function () {

    // All the event route
    Route::post('/generate', [PayrollController::class, 'salary_sheet_generator'])->name('salary_sheet_generator.generate');
    Route::get('/list', [PayrollController::class, 'salary_sheet_list'])->name('salary_sheet_generator.show_list');
    Route::post('/approve', [PayrollController::class, 'salary_gen_approve'])->name('salary_sheet_generator.approve');
    Route::post('/gmb_employee_salary_approval', [PayrollController::class, 'gmb_employee_salary_approval'])->name('salary_sheet_generator.gmb_employee_salary_approval');
    Route::post('/salary_advance_deduction', [PayrollController::class, 'salary_advance_deduction'])->name('salary_sheet_generator.salary_advance_deduction');
    Route::post('/salary_generate_delete', [PayrollController::class, 'salary_generate_delete'])->name('salary_sheet_generator.salary_generate_delete');
    Route::post('/gmb_employee_salary_chart', [PayrollController::class, 'get_employee_salary_charts'])->name('salary_sheet_generator.gmb_employee_salary_chart');
    Route::get('/gmb_employee_salary_chart/download', [PayrollController::class, 'download_employee_salary_charts'])->name('salary_sheet_generator.salary_generate_delete_download');
});
