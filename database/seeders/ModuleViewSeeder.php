<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('module_views')->truncate();

        DB::table('module_views')->insert([
            [
                'view' => 'Side Bar',
                'module_id' => 1
            ],
            [
                'view' => 'Dashboard Landing',
                'module_id' => 3
            ],
            [
                'view' => 'FrontOffice Landing',
                'module_id' => 5
            ],
            [
                'view' => 'Appointment Creation Modal',
                'module_id' => 5
            ],
            [
                'view' => 'Common Phrases',
                'module_id' => 1
            ],
            [
                'view' => 'Calendar Landing',
                'module_id' => 7
            ],
            [
                'view' => 'Doctor Landing',
                'module_id' => 4
            ],
            [
                'view' => 'Numbers',
                'module_id' => 1
            ],
            [
                'view' => 'Patient',
                'module_id' => 6
            ],
            [
                'view' => 'Billing',
                'module_id' => 8
            ],
            [
                'view' => 'Human Resource',
                'module_id' => 12
            ],
            [
                'view' => 'Settings',
                'module_id' => 13
            ],
            [
                'view' => 'Reports',
                'module_id' => 9
            ],
            [
                'view' => 'Insurance',
                'module_id' => 10
            ],
            [
                'view' => 'Imaging',
                'module_id' => 11
            ],
        ]);
    }
}
