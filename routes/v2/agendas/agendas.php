<?php
/**
 **Created by MUWONGE HASSAN on 11/03/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */

use App\Http\Controllers\Api\v2\AgendaController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'agendas','middleware' => ['api']], function() {
    // All the users route
    Route::post("all", [AgendaController::class, "index"])->name('agendas.all');

    // Create new user route
    Route::post("create", [AgendaController::class, "store"])->name('agendas.create');


    Route::post("show", [AgendaController::class, "show"])->name('agendas.show');

    // Edit user details route
    Route::post("update", [AgendaController::class, "update"])->name('agendas.update');

    // Delete user route
    Route::post("delete", [AgendaController::class, "destroy"])->name('agendas.delete');
});
