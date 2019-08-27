<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'super-admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        DB::table('roles')->insert([
            'name' => 'super-admin',
            'guard_name' => 'web'
        ]);
        $user = \App\User::where('name','super-admin')->first();
        $user->assignRole('super-admin');
    }
}
