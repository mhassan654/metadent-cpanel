<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Normal']);
        Role::create(['name' => 'Super-Admin']);
        Role::create(['name' => 'Doctor']);
        Role::create(['name' => 'Receiptionist']);
        Role::create(['name' => 'Appointments']);
        Role::create(['name' => 'Finance']);
        Role::create(['name' => 'Front-Office']);
        Role::create(['name' => 'Communication']);
    }
}
