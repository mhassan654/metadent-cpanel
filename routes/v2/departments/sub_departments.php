<?php
/**
 **Created by MUWONGE HASSAN on 21/01/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 */

use App\Http\Controllers\Api\v2\SubDepartmentController;
use Illuminate\Support\Facades\Route;

Route::prefix("sub_departments")->group(function(){

    Route::get("/", [SubDepartmentController::class, "index"]);

    Route::post("department", [SubDepartmentController::class, "show"]);

    Route::post("store", [SubDepartmentController::class, "store"])->name('sub_departments.store');

    Route::post("update", [SubDepartmentController::class, "update"])->name('sub_departments.update');

    Route::post("delete", [SubDepartmentController::class, "destroy"])->name('sub_departments.delete');
});
