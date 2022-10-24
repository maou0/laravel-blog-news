<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Awesome admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role' => '0',
            'email_verified_at' => '2022-10-23 03:06:39',
        ]);
    }
}
