<?php

namespace Database\Seeders;

use App\Models\Plot;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        Plot::truncate();
        DB::statement("SET foreign_key_checks=1");

        Plot::factory(300)->create();
    }
}
