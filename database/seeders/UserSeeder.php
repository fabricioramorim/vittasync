<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->insert([
            'id' => '1',
            'name' => Str::random(10),
            'registration' => '2671',
            'phone' => '11953704921',
            'is_admin' => '1',
            'is_active' => '1',
            'unit_id' => '1',
            'email' => 'contato@fabrioceras.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),

        ]);
    }
}
