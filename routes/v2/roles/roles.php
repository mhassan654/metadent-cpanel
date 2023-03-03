<?php

/**
 **Created by MUWONGE HASSAN on 17/01/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */

// Authentication and validation routes section

use App\Http\Controllers\Api\v2\RolesController;
use Illuminate\Support\Facades\Route;

Route::prefix("roles")->group(function () {

    //         Check authenticated user route
    Route::post('role', [RolesController::class, 'show'])->name('roles.show');

    // create new roles
    Route::post("all", [RolesController::class, "index"])->name('roles.index');

    Route::post("create", [RolesController::class, "store"])->name('roles.create');

    // update roles
    Route::post('update', [RolesController::class, 'update'])->name('roles.update');

    // delete user role
    Route::post('delete', [RolesController::class, "destroy"])->name('roles.delete');    //

    Route::post('revoke-user-role', [RolesController::class, 'revoke_role_from_user'])->name('roles.revoke_user_role');

    Route::post('revoke-role-permission', [RolesController::class, 'revoke_permission_from_role'])->name('roles.revoke_role_permission');

    Route::post('revoke-user-permission', [RolesController::class, 'revoke_permission_from_user'])->name('roles.revoke_user_permission');

    Route::post('assign-permission-to-role', [RolesController::class, 'assign_permission_to_role'])->name('roles.assign_permission_to_role');

    Route::post('assign-permission-to-user', [RolesController::class, 'give_permission_to_user'])->name('roles.assign_permission_to_user');

    Route::post('give-role-to-user', [RolesController::class, 'give_role_to_user'])->name('roles.give_role_to_user');

    Route::post('sync-roles', [RolesController::class, 'sync_roles'])->name('roles.assign_multi_roles_to_user');

    Route::post('permissions', [RolesController::class, 'get_role_permissions'])->name('roles.view_role_permissions');
});
