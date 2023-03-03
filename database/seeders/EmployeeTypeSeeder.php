<?php

namespace Database\Seeders;

use App\Models\EmployeeType;
use Illuminate\Database\Seeder;

class EmployeeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmployeeType::create(['type' => 'Interns']);
        EmployeeType::create(['type' => 'Admin']);
        EmployeeType::create(['type' => 'Oral Hygienist']);
        EmployeeType::create(['type' => 'Dentist – licensed']);
        EmployeeType::create(['type' => 'Dentist- in training']);
        EmployeeType::create(['type' => 'Orthodontist']);
        EmployeeType::create(['type' => 'Orthodontist – in training']);
        EmployeeType::create(['type' => 'Implant Dentistry']);
        EmployeeType::create(['type' => 'Technician']);
        EmployeeType::create(['type' => 'Cleaning']);
        EmployeeType::create(['type' => 'Assistant-A']);
        EmployeeType::create(['type' => 'Assistant-B']);
        EmployeeType::create(['type' => 'Accountant']);
    }
}
