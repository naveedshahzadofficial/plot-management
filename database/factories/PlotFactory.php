<?php

namespace Database\Factories;

use App\Models\SpecialEconomicZone;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'special_economic_zone_id' => $this->faker->numberBetween(1, SpecialEconomicZone::count()),
            'plot_no' => $this->faker->numberBetween(100,1000),
            'plot_type' => $this->faker->randomElement(['Industrial', 'Commercial']),
            'plot_size' => $this->faker->numberBetween(1,100),
            'latitude' => $this->faker->latitude(30, 31),
            'longitude' => $this->faker->longitude(70, 74),
            'plot_status' =>  $this->faker->randomElement(['Sold', 'Unsold']),
        ];
    }
}
