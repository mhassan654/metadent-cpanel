<?php

namespace Database\Seeders;

use App\Models\HealthHistory;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class HealthHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_UG');
        $id = 1;

        foreach(range(1,140) as $parent)
        {
            HealthHistory::create([
                "patient_id" => $id,
                "facility_id" => rand(1,2),
                "history" => $faker->paragraph,
            ]);

            $id++;
        }

    }
}
