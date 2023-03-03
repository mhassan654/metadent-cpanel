<?php

namespace Database\Seeders;

use App\Models\EmployeeFile;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EmployeeFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_UG');
        $genders = ["Male", "Female"];

        foreach(range(1,10) as $file){
            EmployeeFile::create([
                "employee_id" => rand(1,10),
                "tin_no" => $faker->firstName,
                "gross_salary" => rand(1000,1200),
                "basic" =>  rand(1000,1200),
                "transport" => rand(100,200),
                "transportation_benefit" => rand(100,200),
                "family_benefit" => rand(100,200),
                // "house_rent" => rand(100,200),
                "medical" => rand(100,200),
                // "other_allownace" => rand(100,200),
                "state_income" => rand(1,50),
                "soc_sec_npf_tax" => rand(1,8),
                "loan_deduct" => rand(50,100),
            ]);
        }
    }
}
