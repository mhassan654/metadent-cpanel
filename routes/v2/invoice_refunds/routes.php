<?php

use App\Http\Controllers\Api\v2\InvoiceRefundController;
use App\Http\Controllers\Api\v2\InvoicesController;
use Illuminate\Support\Facades\Route;

// Patients routes section
Route::prefix("invoice-refunds")->group(function(){

    // All the invoice route
    Route::post('invoice', [InvoiceRefundController::class, 'getRefunds'])->name('invoices.refunds.index');

    Route::post('store-refund', [InvoiceRefundController::class, 'store'])->name('invoices.refunds.store');
});
