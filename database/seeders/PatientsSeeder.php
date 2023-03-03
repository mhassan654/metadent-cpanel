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

use App\Models\Patient;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PatientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make("password");
        $faker = Faker::create('en_UG');
        $genders = ["Male", "Female"];
        $marital_statuses = ["Single", "Married","Divorced"];
        $relationship = ["Father", "Mother","sister"];

        foreach(range(1,20) as $parent){
            Patient::create([
                "unique_identifier" => rand(),
                "first_name" => $faker->firstName,
                "last_name" => $faker->lastName,
                "middle_name" => $faker->firstName,
                "gender" => $genders[array_rand($genders)],
                "marital_status" => $marital_statuses[array_rand($marital_statuses)],
                "birth_date" => $faker->dateTimeBetween('1990-01-01', '2016-12-31')->format('d-m-Y'),
                "email" => $faker->email,
                "home_phone" => $faker->phoneNumber,
                "nationality" => "Ugandan",
                "country" => $faker->country,
//                "citizen_service_number" => rand(),
                "state" => $faker->state,
                "city" => $faker->city,
                "street" => $faker->streetName,
                "home_address" => $faker->address,
                "postalcode" => $faker->postcode,
                "patient_insurer" => $faker->name,
                "insurance_policy_number" => rand(),
                "guardian_name" => $faker->name,
                "guardian_phone" => $faker->phoneNumber,
                "guardian_email" => $faker->email,
                "guardian_address" => $faker->address,
                "facility_id" => rand(1,2),
//                "nok_phone_number" => $faker->PhoneNumber,
//                "nok_name" => $faker->Name,
//                "nok_email" => $faker->Email,
                "fm_relationship" => $faker->word,
                "fm_name" => $faker->name,
                "fm_phone_number" => $faker->phoneNumber,
                "fm_email" => $faker->email,
                "fill_if_not_filled" => $faker->word,
                "referred_by" =>$faker->name,
                "referree_email" =>$faker->email,
                "referree_phone" =>$faker->phoneNumber,
                "reviews" =>$faker->word,
                "password"=>$password,
            ]);
        }
    }
}
