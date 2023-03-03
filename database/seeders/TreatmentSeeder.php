<?php

namespace Database\Seeders;

use App\Models\Treatment;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class
TreatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_UG');

        foreach(range(1,10) as $treatment) {
            Treatment::create([
                "treatment" => $faker->word,
                "code" => rand(),
                "price" => $faker->numberBetween(5000, 10000),
                "treatment_category" => $faker->numberBetween(1, 10),
                "tooth_sections" => $faker->word,
                "facility_id" => rand(1,10)
            ]);
        }
    }
}
