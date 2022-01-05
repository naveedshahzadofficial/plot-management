<?php

namespace Database\Factories;

use App\Models\District;
use App\Models\IndustrialZone;
use App\Models\MasterPlan;
use App\Models\SezRate;
use App\Models\SpecialEconomicZone;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpecialEconomicZoneFactory extends Factory
{

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (SpecialEconomicZone $specialEconomicZone) {
            $sezRates = SezRate::factory(rand(10,50))->make();
            $specialEconomicZone->sezRates()->saveMany($sezRates);
            $masterPlans = MasterPlan::factory( rand(10,50))->make();
            $specialEconomicZone->masterPlans()->saveMany($masterPlans);
            $industrialZones = IndustrialZone::factory( rand(10,50))->make();
            $specialEconomicZone->industrialZones()->saveMany($industrialZones);
        });
    }
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $total_area = $this->faker->numberBetween(10000,9999);
        return [
            'district_id' => $this->faker->numberBetween(1, District::count()),
            'name' => $this->faker->company().' Zone',
            'total_area' => $total_area,
            'industrial_area' => floor($total_area/4),
            'industrial_total_plots' => $this->faker->numberBetween(100,1000),
            'commercial_area' => floor($total_area/4),
            'commercial_total_plots' => $this->faker->numberBetween(100,1000),
            'infrastructure_area' => floor($total_area/4),
            'parks_area' => floor(($total_area/4)/3),
            'amenities_area' => floor(($total_area/4)/3),
            'other_area' => floor(($total_area/4)/3),
            'latitude' => $this->faker->latitude(30, 31),
            'longitude' => $this->faker->longitude(70, 74),
            'status' => 1,
        ];
    }
}
