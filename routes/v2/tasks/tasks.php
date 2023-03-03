<?php

use App\Http\Controllers\Api\v2\TaskController;
use Illuminate\Support\Facades\Route;

Route::prefix("tasks")->group(function(){

    Route::post("all", [TaskController::class, "index"])->name('tasks.index');

    Route::post("doctor", [TaskController::class, "get_doctors_tasks"])->name('tasks.view_doctor_tasks');

    Route::post("create", [TaskController::class, "store"])->name('tasks.create');

    Route::post("edit", [TaskController::class, "update"])->name('tasks.edit');

    Route::post("delete", [TaskController::class, "destroy"])->name('tasks.delete');
    Route::post("frontoffice/index", [TaskController::class, "getFrontOfficeTasks"])->name('tasks.frontoffice');
});
