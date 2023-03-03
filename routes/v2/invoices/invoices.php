<?php

use App\Http\Controllers\Api\v2\InvoicesController;
use Illuminate\Support\Facades\Route;

// Patients routes section
//Route::prefix("invoices",)->group(function(){
Route::group(['prefix' =>'invoices', 'middleware' => ['auth:api']],function(){
    // All the invoice route
    Route::post('all', [InvoicesController::class, 'index'])->name('invoices.index');

    Route::post('latest', [InvoicesController::class, 'latest_invoices'])->name('invoices.view_latest_invoices');

    Route::post('paginated', [InvoicesController::class, 'paginated_invoices'])->name('invoices.paginated');

    // Specific invoice record route
    Route::post('invoice', [InvoicesController::class, 'show'])->name('invoices.show');

     // Specific invoice record route
     Route::post('delete', [InvoicesController::class, 'delete'])->name('invoices.delete');

    // Specific patient record route
    Route::post('patient', [InvoicesController::class, 'patient_invoices'])->name('invoices.view_patient_invoices');

    // Create new patient record route
    Route::post('create', [InvoicesController::class, 'store']);

    // Edit patient details route
    Route::post('edit', [InvoicesController::class, 'update'])->name('invoices.edit');

    // Fetch paid invoices route
    Route::post('paid', [InvoicesController::class, 'allPaidInvoices'])->name('invoices.view_paid');

        // Fetch unpaid invoices route
    Route::post('unpaid', [InvoicesController::class, 'unPaidInvoices'])->name('invoices.view_unpaid');

    // send invoice to patients
    Route::post('send-reminder',[InvoicesController::class, 'sendInvoice'])->name('invoices.send_reminder');

    // send single invoice to patients
    Route::post('send-single-invoice',[InvoicesController::class, 'sendSingleInvoice'])->name('invoices.view_invoice_details');

    Route::post('number',[InvoicesController::class, 'invoiceNumber']);

    Route::post('overdue-invoices',[InvoicesController::class,'overdue_invoices'])->name('invoices.view_overdue_invoices');

    Route::post('recent-invoices',[InvoicesController::class,'recent_invoices'])->name('invoices.view_recent_invoices');

    Route::post('patient-invoice-number',[InvoicesController::class,'patient_paid_unpaid_invoices'])->name('invoices.view_patient_invoices');

    Route::post('daily-invoices', [InvoicesController::class, 'daily_invoices'])->name('invoices.view_daily_invoices');

    Route::get('download-pdf',[InvoicesController::class,'download_pdf'])->name('invoices.download_pdf');

    Route::get('download-excel',[InvoicesController::class,'download_excel'])->name('invoices.download_excel');

    Route::get('download-csv',[InvoicesController::class,'download_csv'])->name('invoices.download_csv');

    Route::get('download-invoice/{id}',[InvoicesController::class,'download_invoice_details_pdf'])->name('invoices.download_invoice_details_pdf');

});
