<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class PermissionsController extends ApiBaseController
{

    public function __construct()
    {
//        $this->middleware(['role:Super-Admin']);
//        $this->middleware('permission:permission-create', ['only' => ['store']]);
//        $this->middleware('permission:permission-update', ['only' => ['update']]);
//        $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the permissions.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        // try {
        //     if ($request->user()->can('permission-list')) {
                return $this->customSuccessResponseWithPayload(Permission::orderBy('created_at', 'desc')->get());
            // }
            // return $this->customFailResponseWithPayload('Permission denied');
        // }catch(\Exception $exception)
        // {
        //     return $this->customSuccessResponseWithMessage($exception->getMessage());

        // }

    }


    /**
     * Create a new permission.
     *
     * @return \Illuminate\Http\JsonResponse
     */
//     create a new user permission
    public function store(Request $request)
    {
        $user = $request->user();
        try {
            if ($user->can('permission-create'))
            {
                $validator = Validator::make($request -> all(),[
                    "name" => "required|unique:permissions"
                ]);

                if ($validator -> fails()){
                    $errors = $validator -> errors();
                    return response() -> json($errors -> all(),500);
                }

                DB::beginTransaction();

                $createPermission = Permission::create(['name' =>$request->name]);

                // Check if the new user creation is successful, then proceed
                if (!$createPermission) {
                    DB::rollback();
                    // Notify the client that the desired action was successful
                    return $this->customFailResponseWithPayload($createPermission,"Permission creation failed");
                }

                // else commit the queries
                DB::commit();
                // Notify the client that the desired action was successful
                return $this->customSuccessResponseWithMessage($createPermission,'Permission created successfully');
            }
            return $this->customFailResponseWithPayload('Not Authorized');
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
            if ($request->user()->can('permission-update')) {
                $validator = Validator::make($request -> all(),[
                    "permissionId" => "required",
                    "name" => "required"
                ]);

                if ($validator -> fails()){
                    $errors = $validator -> errors();
                    return response() -> json($errors -> all(),500);
                }

                // Look for the specified user in the database and store in a variable for more computations
//                $permission = Permission::find(request()->permissionId);
                $permission2 = Permission::find(request()->permissionId);

                DB::beginTransaction();
                if ($permission2) {

                    $permission2->update([
                        "name" => request()->name,
                    ]);

                    if (!$permission2 ) {
                        DB::rollBack();
                        // if the user update has failed then notify the client
                        return $this->customFailResponseWithPayload("Permission update failed");
                    }

                    // else commit the queries
                    DB::commit();
                    // Notify the client that the desired action was successful
                    return $this->customSuccessResponseWithMessage($permission2 ,"Permission updated successfully");
                }

//                return $this->customFailResponseWithPayload("User not Found");
            }
            return $this->customFailResponseWithPayload("Permission denied");

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
        // Look for the specified user in the database and store in a variable for more computations
//
        $user = $request->user();
        try {
            // Check if the specified user record exists in the database
            if ($user->can('permission-delete')) {
                $validator = Validator::make($request -> all(),[
                    "permissionId" => "required",
                ]);

                if ($validator -> fails()){
                    $errors = $validator -> errors();
                    return response() -> json($errors -> all(),500);
                }
                $permission = Permission::find(request()->permissionId);
                DB::transaction(function () use ($permission) {
                    DB::table('role_has_permissions')->where('permission_id', $permission->id)->delete();
                    DB::table('model_has_permissions')->where('permission_id', $permission->id)->delete();
                    DB::table('permissions')->where('id', $permission->id)->delete();
                });
                // Notify the client that the desired action was successful
                return $this->customSuccessResponseWithMessage("Permission deleted successfully");
            }

            // If the user does not exist in the database then notify the client
            return $this->customFailResponseWithPayload("Permission does not exist in the system");
        }catch(\Exception $exception)
        {
            return $this->customFailResponseWithPayload($exception->getMessage());
        }

    }
}
