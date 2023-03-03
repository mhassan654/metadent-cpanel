<?php
/**
 **Created by MUWONGE HASSAN on 18/01/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */


use App\Http\Controllers\Api\v1\PatientsController;
use Illuminate\Support\Facades\Route;

// Patients routes section
Route::prefix("imaging")->group(function () {


//    patients with imaging
    Route::get('patients', [PatientsController::class, 'patientImaging']);
});
