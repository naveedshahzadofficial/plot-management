<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        User::truncate();
        DB::statement("SET foreign_key_checks=1");

        $user = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@pbit.gop.pk',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678')
        ]);
        $role = Role::all()->first();
        $user->assignRole($role->id);

        //User::factory(10)->create();
    }
}
