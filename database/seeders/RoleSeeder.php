<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        Role::truncate();
        DB::statement("SET foreign_key_checks=1");

        Role::create(['name' => 'Super Admin', 'guard_name'=>'web']);
        Role::create(['name' => 'Admin', 'guard_name'=>'web']);
        Role::create(['name' => 'SEZ', 'guard_name'=>'web']);
        Role::create(['name' => 'SEC', 'guard_name'=>'web']);
    }
}
