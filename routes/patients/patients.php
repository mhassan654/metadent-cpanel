<?php
// Created by Mulindwa Denis

use Illuminate\Support\Facades\Route;

Route::prefix("patients")->group(function(){

    require __DIR__ . "/appointments/appointments.php";

    require __DIR__ . "/auth/auth.php";

    require __DIR__ . "/invoices/invoices.php";

    require __DIR__ . "/insurance/insurance.php";

    require __DIR__ ."/transactions/transactions.php";

    require __DIR__ ."/history/history.php";
    
});