<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TanslationFactory extends Factory
{
     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Translation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lang' => env('DEFAULT_LANGUAGE'),
            'source_text' => $this->faker->title,
            'translation_text' => $this->faker->text,
        ];
    }
}
