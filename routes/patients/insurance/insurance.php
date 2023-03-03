<?php
// created by Mulindwa Denis

use App\Http\Controllers\Patients\InsuranceController;
use Illuminate\Support\Facades\Route;

Route::resource('insurances',InsuranceController::class);