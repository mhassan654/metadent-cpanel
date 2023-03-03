<?php

namespace Database\Seeders;

use App\Models\Procedures;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProcedureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_UG');

        foreach(range(1,10) as $procedure) {
            Procedures::create([
                "procedure" => $faker->sentence,
                "code" => rand(),
                "price" => $faker->numberBetween(5000, 1000000),
                "facility_id" => rand(1,2)
            ]);
        }
    }
}
