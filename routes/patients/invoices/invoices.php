<?php

use App\Http\Controllers\Patients\InvoicesController;
use Illuminate\Support\Facades\Route;

Route::prefix('invoices')->middleware('jwt.verify')->group(function () {

    //patient Invoices
    Route::post('all', [InvoicesController::class, 'invoices']);

    Route::post('transactions/invoice', [InvoicesController::class, 'get_invoice_transactions_history']);

    Route::post('show', [InvoicesController::class, 'show']);

    Route::post('transaction', [InvoicesController::class, 'transaction']);

    Route::get('download-invoice/{id}', [InvoicesController::class, 'download_invoice_details_pdf']);

    Route::get('download-pdf', [InvoicesController::class, 'download_pdf']);

    Route::get('download-csv', [InvoicesController::class, 'download_csv']);

    Route::get('download-excel', [InvoicesController::class, 'download_excel']);

    Route::get('download-transaction-pdf', [InvoicesController::class, 'download_transaction_pdf']);

    Route::get('download-transaction-csv', [InvoicesController::class, 'download_transaction_csv']);

    Route::get('download-transaction-excel', [InvoicesController::class, 'download_transaction_excel']);

});