<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Specialization;
use Faker\Factory as Faker;

class SpecializationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_UG');

        foreach(range(1,10) as $specialization) {
            Specialization::create([
                "specialization" => $faker->word,
                "facility_id" => rand(1,10)
            ]);
        }
    }
}
