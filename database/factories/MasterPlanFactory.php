<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MasterPlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //'master_plan_file' => $this->faker->image('public/storage/master-plans',640,480, null, false),
            'master_plan_file' => $this->faker->slug(),
            'year' => $this->faker->year(),
        ];
    }
}
