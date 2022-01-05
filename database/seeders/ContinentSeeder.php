<?php

namespace Database\Seeders;

use App\Models\Continent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContinentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        Continent::truncate();
        DB::statement("SET foreign_key_checks=1");

        Continent::create(['continent_name'=>'Africa']);
        Continent::create(['continent_name'=>'Antarctica']);
        Continent::create(['continent_name'=>'Asia']);
        Continent::create(['continent_name'=>'Europe']);
        Continent::create(['continent_name'=>'North America']);
        Continent::create(['continent_name'=>'Oceania']);
        Continent::create(['continent_name'=>'South America']);
    }
}
