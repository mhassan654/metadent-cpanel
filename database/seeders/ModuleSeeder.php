<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->insert([
            [
                'module' => 'Global'
            ],
            [
                'module' => 'Login'
            ],
            [
                'module' => 'Dashboard'
            ],
            [
                'module' => 'Doctor'
            ],
            [
                'module' => 'FrontOffice'
            ],
            [
                'module' => 'Patients'
            ],
            [
                'module' => 'Calendar'
            ],
            [
                'module' => 'Billing'
            ],
            [
                'module' => 'Reports'
            ],
            [
                'module' => 'Insurance'
            ],
            [
                'module' => 'Imaging'
            ],
            [
                'module' => 'Human Resources'
            ],
            [
                'module' => 'Settings'
            ],
            [
                'module' => 'Communications'
            ],
        ]);
    }
}
