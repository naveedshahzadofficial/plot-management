<?php

namespace Database\Seeders;

use App\Models\BusinessStructure;
use Illuminate\Database\Seeder;

class BusinessStructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BusinessStructure::create(['structure_name'=>'Sole Proprietorship']);
        BusinessStructure::create(['structure_name'=>'Partnership Firm']);
        BusinessStructure::create(['structure_name'=>'Single Member Company']);
        BusinessStructure::create(['structure_name'=>'Private Limited']);
        BusinessStructure::create(['structure_name'=>'Public Limited']);
    }
}
