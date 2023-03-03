<?php
/**
 **Created by MUWONGE HASSAN on 13/01/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */

use App\Http\Controllers\Api\v2\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix("users")->group(function(){
//Route::group(['prefix' => 'users','middleware' => ['role:developer']], static function() {
    // All the users route
    Route::post("all", [UserController::class, "index"]);

    // Create new user route
    Route::post("create", [UserController::class, "store"]);


    Route::post("show", [UserController::class, "show"]);

    // Edit user details route
    Route::patch("update", [UserController::class, "update"]);

    // Delete user route
    Route::post("delete", [UserController::class, "destroy"]);

    //search
    Route::post("search", [UserController::class, "search"]);
});
