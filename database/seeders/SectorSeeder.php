<?php

namespace Database\Seeders;

use App\Models\Sector;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        Sector::truncate();
        DB::statement("SET foreign_key_checks=1");

        Sector::create(['name'=>'Manufacturing']);
        Sector::create(['name'=>'Trading']);
        Sector::create(['name'=>'Services']);
        Sector::create(['name'=>'Mining and Quarrying']);
        Sector::create(['name'=>'Agriculture']);
        Sector::create(['name'=>'Fisheries and Forestry']);
        Sector::create(['name'=>'Construction']);
    }
}
