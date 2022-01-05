<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SezRateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rate_per_acre' => $this->faker->randomNumber(7),
            'date_of_approval' => $this->faker->date(),
        ];
    }
}
