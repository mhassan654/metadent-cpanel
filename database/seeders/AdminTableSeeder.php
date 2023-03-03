<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make("password");

        $user = Admin::create([
            "name" => "super",
            "password" => $password,
            "email" => "admin@metadent.nl",
        ]);
//        $user->assignRole('Super-Admin');

    }
}
