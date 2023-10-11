<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

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
            'nama' => 'Administrator',
            'level' => 'admin',
            'username' => 'dandiagungs29',
            'password' => Hash::make('admin123'),
            'remember_token' => Str::random(),
        ]);
    }
}
