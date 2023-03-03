<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TreatmentTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'facility_id' => 1,
            'title' => $this->faker->sentence(),
            'procedures' => [11,13,14],
            'code' => $this->faker->word(),
            'color' => $this->faker->hexColor(),
        ];
    }
}
