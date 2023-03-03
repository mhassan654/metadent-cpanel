<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use App\Models\Employee;
use App\Modules\Common\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends ApiBaseController
{
    /**
     * Display a listing of the permissions.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {

        // if ($this->authUser()->can('Create Patient')) {
        $roles = Cache::remember('roles', 1 * 60, function () {
            return Role::with('permissions')->get(['id', 'name']);
        });
        return $this->customSuccessResponseWithPayload($roles);

        // }
        // return $this->customFailResponseWithPayload('Permission denied');
    }

    /**
     * Create a new permission.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    //     create a new user permission
    public function store(Request $request)
    {

        //        check permission before validation

        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:roles,name',
                'permission' => 'required',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json($errors->all(), 500);
            }
            // Start transaction
            DB::beginTransaction();
            $role = Role::create(['name' => $request->input('name')]);
            $role->syncPermissions($request->input('permission'));

            // Check if the new user creation is successful, then proceed
            if (!$role) {
                DB::rollback();
                // Notify the client that the desired action was successful
                return $this->customFailResponseWithPayload("Role creation failed");
            }

            // else commit the queries
            DB::commit();
            // Notify the client that the desired action was successful
            return $this->customSuccessResponseWithMessage($role, 'Role created successfully');
        } catch (\Exception $exception) {
            return $this->customFailResponseWithPayload($exception->getMessage());
        }
    }

    public function show(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'roleId' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors->all(), 500);
        }
        $role = Role::find($request->roleId);
        $rolePermissions['permissions'] = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $request->roleId)
            ->get();

        return $this->customSuccessResponseWithMessage($role, $rolePermissions);
    }

    /**
     * Update a permission.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {

        try {
            if ($this->authUser()->can('roles-update')) {
                $validator = Validator::make($request->all(), [
                    "roleId" => "required",
                    'name' => 'required',
                    'permission' => 'required',
                ]);

                if ($validator->fails()) {
                    $errors = $validator->errors();
                    return response()->json($errors->all(), 500);
                }

                // Look for the specified user in the database and store in a variable for more computations
                //                $permission = Permission::find(request()->permissionId);
                $role = Role::find(request()->roleId);

                DB::beginTransaction();
                if ($role) {

                    $role = Role::find($request->roleId);
                    $role->name = $request->input('name');
                    $role->save();

                    $role->syncPermissions($request->input('permission'));

                    if (!$role) {
                        DB::rollBack();
                        // if the user update has failed then notify the client
                        return $this->customFailResponseWithPayload("Role update failed");
                    }

                    // else commit the queries
                    DB::commit();
                    // Notify the client that the desired action was successful
                    return $this->customSuccessResponseWithMessage($role, "Role updated successfully");
                }

                return $this->customFailResponseWithPayload("User not Found");
            }
            return $this->customFailResponseWithPayload("Permission denied");
        } catch (\Exception $exception) {
            return $this->customFailResponseWithPayload($exception->getMessage());
        }
    }

    /**
     * Remove the specified permission from storage.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {

        try {
            // Check if the specified user record exists in the database
            if ($this->authUser()->can('role-delete')) {
                $validator = Validator::make($request->all(), [
                    "roleId" => "required",
                ]);

                if ($validator->fails()) {
                    $errors = $validator->errors();
                    return response()->json($errors->all(), 500);
                }

                //                DB::table("roles")->where('id',$id)->delete();
                $role = Role::find(request()->roleId);
                DB::transaction(function () use ($role) {
                    DB::table('role_has_permissions')->where('role_id', $role->id)->delete();
                    DB::table('model_has_roles')->where('role_id', $role->id)->delete();
                    DB::table('roles')->where('id', $role->id)->delete();
                });
                // Notify the client that the desired action was successful
                return $this->customSuccessResponseWithMessage("Role deleted successfully");
            }

            // If the user does not exist in the database then notify the client
            return $this->customFailResponseWithPayload("Role does not exist!");
        } catch (\Exception $exception) {
            return $this->customFailResponseWithPayload($exception->getMessage());
        }
    }

    //    revoke role from user
    public function revoke_role_from_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "userId" => "required",
            "roleId" => "required",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors->all(), 500);
        }

        $user = Employee::find($request->userId);
        $role = Role::find($request->roleId);
        if ($user && $role) {
            $user->removeRole($request->roleId);
            return $this->customSuccessResponseWithPayload('Role revoked successfully');
        }
        return $this->customFailResponseWithPayload('Role or User not found');
    }

    //    revoke permission from role
    public function revoke_permission_from_role(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "roleId" => "required",
            "permissions" => "required",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors->all(), 500);
        }

        $role = Role::find($request->roleId);
        $role->revokePermissionTo($request->permissions);
        return $this->customSuccessResponseWithPayload('Permission revoked successfully');
    }

    //    assign permission to a role
    public function assign_permission_to_role(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "roleName" => "required",
            "permission" => "required",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors->all(), 500);
        }
        try {
            $role = Role::findByName($request->roleName);
            $role->givePermissionTo($request->permission);
            return $this->customSuccessResponseWithPayload('Permission assigned successfully', 500);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function give_permission_to_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "userId" => "required",
            "permissions" => "required",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors->all(), 500);
        }

        $user = Employee::find($request->userId);
        try {
            if ($user) {
                $user->givePermissionTo([$request->input('permissions')]);
                return $this->customSuccessResponseWithPayload('Permission assigned successfully');
            }
            return $this->customFailResponseWithPayload('User not found');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function revoke_permission_from_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "userId" => "required",
            "permission" => "required",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors->all(), 500);
        }

        $user = Employee::find($request->userId);
        try {
            if ($user) {
                $user->revokePermissionTo($request->input('permission'));
                return $this->customSuccessResponseWithPayload('Permission removed successfully');
            }
            return $this->customFailResponseWithPayload('User not found');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function give_role_to_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "userId" => "required",
            "roles" => "required",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors->all(), 500);
        }

        $user = Employee::find($request->userId);
        try {
            if ($user) {
                $user->assignRole([$request->input('roles')]);
                return $this->customSuccessResponseWithPayload('Role assigned successfully');
            }
            return $this->customFailResponseWithPayload('User not found');
        } catch (\Throwable $e) {
            return $this->customFailResponseWithPayload($e->getMessage());
        }
    }

    // assign multiple roles to a user, all current roles will be removed from the user and assigned new ones
    public function sync_roles(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "userId" => "required",
            "roles" => "required",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors->all(), 500);
        }

        $user = Employee::find($request->userId);
        try {
            $user->syncRoles([$request->input('roles')]);
            return $this->customSuccessResponseWithPayload('Roles synced successfully');
        } catch (\Throwable $e) {
            return $this->customFailResponseWithPayload($e->getMessage());
        }
    }

    public function get_role_permissions(Request $request)
    {
        try {
            Helper::custom_validator($request->all(), [
                "role_id" => "required"
            ]);

            $role = Role::findById($request->role_id);

            return $this->sendResponse($role->permissions, 'Roles permissions fetched successfully');
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage());
        }
    }
}
