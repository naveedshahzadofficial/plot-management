<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        Question::truncate();
        DB::statement("SET foreign_key_checks=1");

        Question::create(['name'=>'Yes']);
        Question::create(['name'=>'No']);
    }
}
