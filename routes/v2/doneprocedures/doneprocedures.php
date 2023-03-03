<?php
/**
 **Created by MUWONGE HASSAN on 21/01/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */

use App\Http\Controllers\Api\v2\DoneProceduresController;
use Illuminate\Support\Facades\Route;

Route::prefix("doneprocedures")->group(function(){
    Route::post("all", [DoneProceduresController::class, "index"]);

    Route::post("create", [DoneProceduresController::class, "store"])->name('doneprocedures.show');

    Route::post("edit", [DoneProceduresController::class, "update"])->name('doneprocedures.update');
});
