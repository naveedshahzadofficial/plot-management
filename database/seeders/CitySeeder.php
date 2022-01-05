<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        City::truncate();
        DB::statement("SET foreign_key_checks=1");

        $path = base_path("database/data/cities__2021-05-27.sql");
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
