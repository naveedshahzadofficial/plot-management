<?php

namespace Database\Seeders;

use App\Models\Continent;
use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        Country::truncate();
        DB::statement("SET foreign_key_checks=1");

        $csvFile = fopen(base_path("database/data/list_of_countries.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                $continent = Continent::where('continent_name', $data['1']??null)->first();
                Country::create([
                    "continent_id" => $continent->id??null,
                    "country_name" => $data['2']??null,
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
