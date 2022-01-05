<?php

namespace Database\Factories;

use App\Models\Sector;
use Illuminate\Database\Eloquent\Factories\Factory;

class IndustrialZoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sector_id' => $this->faker->numberBetween(1, Sector::count()),
            'area'=> floor($this->faker->numberBetween(1000,9999)/4)
        ];
    }
}
