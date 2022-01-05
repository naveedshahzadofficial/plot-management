<?php

namespace Database\Seeders;

use App\Models\IndustrialZone;
use App\Models\MasterPlan;
use App\Models\SezRate;
use App\Models\SpecialEconomicZone;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialEconomicZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        SezRate::truncate();
        MasterPlan::truncate();
        IndustrialZone::truncate();
        SpecialEconomicZone::truncate();
        DB::statement("SET foreign_key_checks=1");

        SpecialEconomicZone::factory(100)->create();
    }
}
