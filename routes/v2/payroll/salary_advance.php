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

Route::group(['prefix' => 'salary_advance'], function () {

    // All the event route
    Route::get('/', [PayrollController::class, 'index'])->name('salary_advance.index');

    Route::post('/create', [PayrollController::class, 'insert_salary_advance'])->name('salary_advance.create');

    // Specific event record route
    Route::get('list', [PayrollController::class, 'salary_advance_list'])->name('salary_advance.list');
    Route::get('unpaid', [PayrollController::class, 'salary_advance_to_be_paid'])->name('salary_advance.unpaid');

    Route::post('check_out', [PayrollController::class, 'check_out'])->name('salary_advance.check_out');

    Route::post('bulk-upload', [PayrollController::class, 'import'])->name('salary_advance.bulk_upload');

});
