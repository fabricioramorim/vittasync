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
       // Users seeder
       $users = [
        [
            'id' => '0',
            'name' => 'Fabricio',
            'last_name' => 'Amorim',
            'cpf' => '12345678901',
            'birth_date' => '1980-01-01',
            'registration' => '2671',
            'phone' => '+5511953704921',
            'cep' => '06766200',
            'address' => 'Rua João de Barros, 100',
            'number' => '100',
            'is_admin' => '0',
            'is_active' => '1',
            'vaccine_id' => '2',
            'vaccin_confirm' => '0',
            'unit_id' => '1',
            'email' => 'contato@fabrioceras.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ],
        
        [
            'id' => '6',
            'name' => 'Edneia',
            'last_name' => 'de Fatima Siqueira Maciel',
            'cpf' => '396.897.488-31',
            'birth_date' => '1991-03-14',
            'registration' => '482964',
            'phone' => '+5511953704921',
            'cep' => '06766200',
            'address' => 'Rua João de Barros, 100',
            'number' => '100',
            'is_admin' => '99',
            'is_active' => '1',
            'vaccine_id' => '2',
            'vaccin_confirm' => '0',
            'unit_id' => '1',
            'email' => 'contato@fabrioceras.com',
            'email_verified_at' => now(),
            'password' => Hash::make('482964'),
            'remember_token' => Str::random(10),
        ]
    ];

    DB::table('users')->insert($users);
    }
}
