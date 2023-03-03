<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleHasPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_has_permissions')->delete();
        
        \DB::table('role_has_permissions')->insert(array (
            0 => 
            array (
                'permission_id' => 7,
                'role_id' => 5,
            ),
            1 => 
            array (
                'permission_id' => 8,
                'role_id' => 5,
            ),
            2 => 
            array (
                'permission_id' => 9,
                'role_id' => 5,
            ),
            3 => 
            array (
                'permission_id' => 10,
                'role_id' => 5,
            ),
            4 => 
            array (
                'permission_id' => 11,
                'role_id' => 5,
            ),
            5 => 
            array (
                'permission_id' => 12,
                'role_id' => 5,
            ),
            6 => 
            array (
                'permission_id' => 13,
                'role_id' => 5,
            ),
            7 => 
            array (
                'permission_id' => 14,
                'role_id' => 5,
            ),
            8 => 
            array (
                'permission_id' => 15,
                'role_id' => 5,
            ),
            9 => 
            array (
                'permission_id' => 16,
                'role_id' => 5,
            ),
        ));
        
        
    }
}