<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ChartOfAccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'account_name' => $this->faker->name(),
            'account_sub_type' => $this->faker->paragraph(3, true),
            'account_type' => $this->faker->paragraph(3, true),
            'gl_code' => mt_rand(10000, 50000),
            'description' => $this->faker->sentence()
        ];
    }
}