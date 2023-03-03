<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EmployeeSalaryType;

class EmployeeSalaryPayTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmployeeSalaryType::create([
            "payment_period" => "Hourly"
        ]);

        EmployeeSalaryType::create([
            "payment_period" => "Daily"
        ]);

        EmployeeSalaryType::create([
            "payment_period" => "Weekly"
        ]);

        EmployeeSalaryType::create([
            "payment_period" => "Monthly"
        ]);

        EmployeeSalaryType::create([
            "payment_period" => "Annually"
        ]);
    }
}
