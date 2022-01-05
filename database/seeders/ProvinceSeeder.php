<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        Province::truncate();
        DB::statement("SET foreign_key_checks=1");

        Province::create(['province_name'=>'AZAD JAMMU AND KASHMIR']);
        Province::create(['province_name'=>'BALUCHISTAN']);
        Province::create(['province_name'=>'FEDERALLY ADMINISTERED TRIBAL AREAS', 'province_status'=>0]);
        Province::create(['province_name'=>'GILGIT BALTISTAN']);
        Province::create(['province_name'=>'ISLAMABAD CAPITAL TERRITORY']);
        Province::create(['province_name'=>'KHYBER PAKHTUNKHWA']);
        Province::create(['province_name'=>'PUNJAB']);
        Province::create(['province_name'=>'SINDH']);
    }
}
