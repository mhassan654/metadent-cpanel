<?php

use App\Http\Controllers\Api\v1\InvoicesController;
use Illuminate\Support\Facades\Route;

// Patients routes section
Route::prefix("invoices")->group(function(){

    // All the invoice route
    Route::post('all', [InvoicesController::class, 'index']);

    // Specific invoice record route
    Route::post('invoice', [InvoicesController::class, 'show']);

    // Specific invoice record route
    Route::post('delete', [InvoicesController::class, 'delete']);

    // Specific patient record route
    Route::post('patient', [InvoicesController::class, 'patient_invoices']);

    // Create new patient record route
    Route::post('create', [InvoicesController::class, 'store']);

    // Edit patient details route
    Route::post('edit', [InvoicesController::class, 'update']);

    // Fetch paid invoices route
    Route::post('paid', [InvoicesController::class, 'allPaidInvoices']);

    // Fetch unpaid invoices route
    Route::post('unpaid', [InvoicesController::class, 'unPaidInvoices']);

    // send invoice to patients
    Route::post('send-reminder',[InvoicesController::class, 'sendInvoice']);

    // send single invoice to patients
    Route::post('send-single-invoice',[InvoicesController::class, 'sendSingleInvoice']);

    Route::post('number',[InvoicesController::class, 'invoiceNumber']);
});
