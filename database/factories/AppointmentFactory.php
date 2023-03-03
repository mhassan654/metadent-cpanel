<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "facility_id" => 1,
            "patient_id" => 1,
            "type_id" => 1,
            "status_id" => rand(1,7),
            "period_id" => rand(1,4),
            "source_id" => rand(1, 3),
            "frequency_id" => rand(1, 3),
            "department_id" => rand(1, 3),
            "treatment_type_id" => rand(1, 3),
            "appointment_type_id" => null,
            "doctors" => [4],
            "date" => Carbon::parse($this->faker->date())->format('d-m-Y'),
            "slots" => [
                [
                    "start-time"=> $this->faker->time(),
                    "end-time"=> $this->faker->time(),
                ]
            ],
            'interval' => rand(10, 30),
            "comments" => $this->faker->paragraph(),
        ];
    }
}
