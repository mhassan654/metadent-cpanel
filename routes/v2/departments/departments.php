<?php
/**
 **Created by MUWONGE HASSAN on 21/01/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */

use App\Http\Controllers\Api\v2\DepartmentsController;
use Illuminate\Support\Facades\Route;

Route::prefix("departments")->group(function(){

    Route::post("all", [DepartmentsController::class, "index"]);

    Route::post("department", [DepartmentsController::class, "show"]);

    Route::post("create", [DepartmentsController::class, "store"])->name('departments.create');

    Route::post("update", [DepartmentsController::class, "update"])->name('departments.update');

    Route::post("update-parent", [DepartmentsController::class, "change_parent"])->name('departments.update_parent');

    Route::post("delete", [DepartmentsController::class, "destroy"])->name('departments.delete');

    Route::get('front-office-departments',[DepartmentsController::class,'front_office_departments']);
});
