<?php

namespace Database\Seeders;

use App\Models\TreatmentProcedure;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class TreatmentProcedureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_US');

        foreach(range(1,10) as $specialization) {
            TreatmentProcedure::create([
                "name" => $faker->word,
                "interval" => rand(1,10),
                "set_period" => rand(1,10),
                "treatment_id" => 1
            ]);
        }
    }
}
