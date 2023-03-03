<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Department::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Department::create([
            'department' => 'Front Office',
            'facility_id' => 1
        ]);

        Department::create([
            'department' => 'Dentists',
            'facility_id' => 1
        ]);
    }
}
