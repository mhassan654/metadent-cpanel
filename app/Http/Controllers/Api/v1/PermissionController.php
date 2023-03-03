<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    public function permission()
    {
        $dev_permission = Permission::where('slug','create-tasks')->first();
        $manager_permission = Permission::where('slug', 'edit-users')->first();

        //RoleTableSeeder.php
        $dev_role = new Role();
        $dev_role->slug = 'developer';
        $dev_role->name = 'Front-end Developer';
        $dev_role->save();
        $dev_role->permissions()->attach($dev_permission);

        $manager_role = new Role();
        $manager_role->slug= 'manager';
        $manager_role->name = 'Assistant Manager';
        $manager_role->save();
        $manager_role->permissions()->attach($manager_permission);

        $dev_role = Role::where('slug','developer')->first();
        $manager_role = Role::where('slug', 'manager')->first();

        $createTasks = new Permission();
        $createTasks->slug = 'create-tasks';
        $createTasks->name = 'Create Tasks';
        $createTasks->save();
        $createTasks->roles()->attach($dev_role);

        $editUsers = new Permission();
        $editUsers->slug = 'edit-users';
        $editUsers->name = 'Edit Users';
        $editUsers->save();
        $editUsers->roles()->attach($manager_role);

        $dev_role = Role::where('slug','developer')->first();
        $manager_role = Role::where('slug', 'manager')->first();
        $dev_perm = Permission::where('slug','create-tasks')->first();
        $manager_perm = Permission::where('slug','edit-users')->first();

        $developer = new User();
        $developer->first_name = 'Saava Hasan';
        $developer->last_name = 'SaavaHasangfh';
        $developer->gender = 'male';
        $developer->address = 'sagse';
        $developer->phonenumber = 'Mahedi Hasangfh';
        $developer->account_status_id = 2;
        $developer->specializations= 'Mahedi Hasangfh';
        $developer->birth_date =  null;
        $developer->facility_id = 1;
        $developer->role_id = 1;
        $developer->email = 'mahedi@gmail.com';
        $developer->password = bcrypt('secrettt');
        $developer->save();
        $developer->roles()->attach($dev_role);
        $developer->permissions()->attach($dev_perm);


        return redirect()->back();
    }

    public function index()
    {
        return $this->customSuccessResponseWithPayload(Permission::orderBy('created_at', 'desc')->get());
    }
}
