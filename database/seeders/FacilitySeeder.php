<?php
/*
 *
 * @Author: Wavamuno Brandon Elijah
 * @Email: brandonelijah099@gmail.com
 * @Github: Elijahwb
 * @Tel: +256 753 659 098 / +256 770 944 854
 *
 */

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_UG');

        Facility::create([
            "name" => "Case Hospital",
            "location" => $faker->address,
            "email" => "info@casehospital.ug",
            "phonenumber" => $faker->phoneNumber,
            "city" => $faker->city,
            "country" => "Uganda",
            "subscription_id" => rand(1,3),
            "facility_status_id" => rand(1,3),
        ]);

        Facility::create([
            "name" => "Norvik Hospital",
            "location" => $faker->address,
            "email" => "info@norvikhospital.ug",
            "phonenumber" => $faker->phoneNumber,
            "city" => $faker->city,
            "country" => "Uganda",
            "subscription_id" => rand(1,3),
            "facility_status_id" => rand(1,3),
        ]);
    }
}
