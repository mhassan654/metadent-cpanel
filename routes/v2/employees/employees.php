<?php
/**
 **Created by MUWONGE HASSAN on 08/06/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://
 */
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v2\EmployeeController;

// All the translation route
// Route::resource('translations', TranslationsController::class);
// Route::get('translations', TranslationsController::class);
Route::group(['prefix' => 'employees'], function () {

    // All the event route
    Route::get('/', [EmployeeController::class, 'index'])->name('employees.index');

    Route::post('/show', [EmployeeController::class, 'show'])->name('employees.show');

    // Specific event record route
    Route::post('store', [EmployeeController::class, 'store'])->name('employees.store');

    // Specific event record route
    Route::post('update', [EmployeeController::class, 'update'])->name('employees.update');

    Route::post('update_status', [EmployeeController::class, 'change_status'])->name('employees.update_status');
    Route::post('update_image', [EmployeeController::class, 'update_image'])->name('employees.update_image');
    Route::post('delete', [EmployeeController::class, 'destroy'])->name('employees.delete');
    Route::get('download-pdf', [EmployeeController::class, 'download_pdf'])->name('employees.download_pdf');
    Route::get('download-excel', [EmployeeController::class, 'download_excel'])->name('employees.download_excel');
    Route::get('download-csv', [EmployeeController::class, 'download_csv'])->name('employees.download_csv');
    Route::post('paginated-employees', [EmployeeController::class, 'paginated_employees'])->name('employees.index');
    Route::get('download-pdf-single', [EmployeeController::class, 'download_single_employee_pdf'])->name('employees.download_pdf');
    Route::get('download-logs-pdf', [EmployeeController::class, 'download_employees_with_latest_log_pdf'])->name('employees.download_pdf');
    Route::get('download-logs-csv', [EmployeeController::class, 'download_employees_with_latest_log_csv'])->name('employees.download_csv');
    Route::get('download-logs-excel', [EmployeeController::class, 'download_employees_with_latest_log_excel'])->name('employees.download_excel');
    Route::post('employee-latest-treatment', [EmployeeController::class, 'employee_with_latest_treatment'])->name('employees.index');
    Route::get('download-employee-treatments-pdf', [EmployeeController::class, 'download_employee_treatments_pdf'])->name('employees.download_pdf');
    Route::get('download-employee-treatments-csv', [EmployeeController::class, 'download_employee_treatments_csv'])->name('employees.download_csv');
    Route::get('download-employee-treatments-excel', [EmployeeController::class, 'download_employee_treatments_excel'])->name('employees.download_excel');
});
