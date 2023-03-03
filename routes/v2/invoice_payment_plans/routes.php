<?php

use App\Http\Controllers\Api\v2\InvoiceRefundController;
use App\Http\Controllers\Api\v2\InvoicesController;
use App\Http\Controllers\Api\v2\PaymentPlanController;
use Illuminate\Support\Facades\Route;

// Patients routes section
Route::prefix("invoice-payment-plans")->group(function(){

    // All the invoice route
    Route::post('invoice', [PaymentPlanController::class, 'getRefunds'])->name('plan.index');

    Route::post('store', [PaymentPlanController::class, 'store'])->name('plan.refunds.store');

    Route::post('reminder', [PaymentPlanController::class, 'payment_plan_reminder'])->name('plan.refunds.reminder');
});
