<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{

    /**
     * Display a listing of the permissions.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $roles = Cache::remember('roles', 2*60, function() {
                return Role::orderBy('created_at', 'desc')->get();
            });
                return $this->customSuccessResponseWithPayload($roles);

        }catch(\Exception $exception)
        {
            return $this->customSuccessResponseWithMessage($exception->getMessage());
        }

    }


    /**
     * Create a new permission.
     *
     * @return \Illuminate\Http\JsonResponse
     */
//     create a new user permission
    public function store(Request  $request)
    {

//        check permission before validation
        try {

                $validator = Validator::make($request -> all(),[
                    "permission" => "required",
                    "slug" => "required|unique:roles",
                    "name" => "required|unique:roles"
                ]);

                if ($validator -> fails()){
                    $errors = $validator -> errors();
                    return response() -> json($errors -> all(),500);
                }
                $request->validate([

                ]);
                // Start transaction
                DB::beginTransaction();

                $permission = Permission::where('slug', $request->permission)->first();
                $newRole = new Role();
                $newRole->slug= $request->slug;
                $newRole->name = $request->name;
                $newRole->save();
                $newRole->permissions()->attach($permission);

                // Check if the new user creation is successful, then proceed
                if (!$newRole) {
                    DB::rollback();
                    // Notify the client that the desired action was successful
                    return $this->customFailResponseWithPayload("Role creation failed");
                }

                // else commit the queries
                DB::commit();
                // Notify the client that the desired action was successful
                return $this->customSuccessResponseWithMessage($newRole,'Role created successfully');

        }catch (\Exception $exception)
        {
            return  $this->customFailResponseWithPayload($exception->getMessage());
        }

    }


    /**
     * Update a permission.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {

        try{

                $validator = Validator::make($request -> all(),[
                    "roleId" => "required",
                    "slug" => "required",
                    "name" => "required"
                ]);

                if ($validator -> fails()){
                    $errors = $validator -> errors();
                    return response() -> json($errors -> all(),500);
                }

                // Look for the specified user in the database and store in a variable for more computations
//                $permission = Permission::find(request()->permissionId);
                $role = Role::find(request()->roleId);

                DB::beginTransaction();
                if ($role) {

                    $role->update([
                        "slug" => request()->slug,
                        "name" => request()->name,
                    ]);

                    if(!empty(request()->permission))
                    {
                        $permission = Permission::where('slug', $request->permission)->first();

                        $role->permissions()->attach($permission);
                    }

                    if (!$role ) {
                        DB::rollBack();
                        // if the user update has failed then notify the client
                        return $this->customFailResponseWithPayload("Role update failed");
                    }

                    // else commit the queries
                    DB::commit();
                    // Notify the client that the desired action was successful
                    return $this->customSuccessResponseWithMessage($role ,"Role updated successfully");
                }

//                return $this->customFailResponseWithPayload("User not Found");


        }catch(\Exception $exception)
        {
            return  $this->customFailResponseWithPayload($exception->getMessage());

        }

    }

    /**
     * Remove the specified permission from storage.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {

        try{

                $validator = Validator::make($request -> all(),[
                    "roleId" => "required",
                ]);

                if ($validator -> fails()){
                    $errors = $validator -> errors();
                    return response() -> json($errors -> all(),500);
                }
                $role = Role::find(request()->roleId);
                DB::transaction(function () use ($role) {
                    DB::table('roles_permissions')->where('permission_id', $role->id)->delete();
                    DB::table('users_roles')->where('permission_id', $role->id)->delete();
                    DB::table('roles')->where('id', $role->id)->delete();
                });
                // Notify the client that the desired action was successful
                return $this->customSuccessResponseWithMessage("Role deleted successfully");

        }catch(\Exception $exception)
        {
            return $this->customFailResponseWithPayload($exception->getMessage());
        }

    }
}

