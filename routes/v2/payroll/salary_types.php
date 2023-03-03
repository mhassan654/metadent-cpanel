<?php
/**
 **Created by MUWONGE HASSAN on 08/06/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://
 */
use App\Http\Controllers\Api\v2\SalaryTypeController;

Route::group(['prefix' => 'salary_types'], function () {

    // All the event route
    Route::get('/', [SalaryTypeController::class, 'index'])->name('salary_types.index');

    Route::post('/create', [SalaryTypeController::class, 'store'])->name('salary_types.create');

    Route::post('/edit', [SalaryTypeController::class, 'update'])->name('salary_types.edit');

    // Specific event record route
    Route::post('delete', [SalaryTypeController::class, 'destroy'])->name('salary_types.delete');


});
