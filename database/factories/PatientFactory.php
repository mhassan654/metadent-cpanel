<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender_list = ['Male', 'Female'];
        $marital_statuses_list = ['Married', 'Single', 'Divorced'];
        $fm_relationships = ['Father', 'Mother', 'Sister', 'Brother', 'Cousin', 'Uncle', 'Aunt', 'Grand parent'];

        return [
            "unique_identifier" => rand(),
            "facility_id" => 1,
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'middle_name' => null,
            'gender' => $gender_list[array_rand($gender_list)],
            'marital_status' => $marital_statuses_list[array_rand($marital_statuses_list)],
            'birth_date' => $this->faker->date(),
            'email' => $this->faker->safeEmail(),
            'home_phone' => $this->faker->phoneNumber(),
            'home_address' => $this->faker->phoneNumber(),
            'patient_phone' => $this->faker->phoneNumber(),
            'nationality' => $this->faker->country(),
            'country' => $this->faker->country(),
            'state' => $this->faker->sentence(),
            'city' => $this->faker->city(),
            'street' => $this->faker->streetAddress(),
            'postalcode' => $this->faker->postcode(),
            'patient_insurer' => $this->faker->sentence(),
            'insurance_policy_number' => $this->faker->randomNumber,
            'guardian_name' => $this->faker->firstName(),
            'guardian_phone' => $this->faker->phoneNumber(),
            'guardian_email' => $this->faker->safeEmail(),
            'guardian_address' => $this->faker->address(),
            'reviews' => $this->faker->paragraphs(4,true),
            'citizen_service_number' => $this->faker->randomNumber(),
            'nok_phone_number' => $this->faker->phoneNumber(),
            'nok_email' => $this->faker->safeEmail(),
            'fm_relationship' => $fm_relationships[array_rand($fm_relationships)],
            'fm_name' => $this->faker->lastName(),
            'fm_phone_number' => $this->faker->phoneNumber(),
            'fm_email' => $this->faker->safeEmail(),
            'fill_if_not_filled' => $this->faker->sentence(),
            'referred_by' => $this->faker->firstName(),
            'referree_email' => $this->faker->safeEmail(),
            'referree_phone' => $this->faker->phoneNumber(),
            'main_doctor_id' => 1,

        ];
    }
}