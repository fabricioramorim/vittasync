<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
 // Initial user
 DB::table('accesses')->insert([
    'id' => '0',
    'date_access' => '2024-10-12',
]);

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
        'vaccine_id' => '0',
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
        'vaccine_id' => '0',
        'vaccin_confirm' => '0',
        'unit_id' => '1',
        'email' => 'contato@fabrioceras.com',
        'email_verified_at' => now(),
        'password' => Hash::make('14031991'),
        'remember_token' => Str::random(10),
    ]
];

DB::table('users')->insert($users);

// Dependents Seeder
$dependents = [
    [
        'id' => '22',
        'name' => 'Heitor',
        'last_name' => 'Siqueira Maciel',
        'cpf' => '604.091.078-08',
        'birth_date' => '2022-07-18',
        'vaccine_id' => '0',
        'unit_id' => '',
        'employee_id' => '6',
        'unit_id' => '1',
        'is_active' => '1',
    ],
    [
        'id' => '11',
        'name' => 'Larissa',
        'last_name' => 'Siqueira Maciel',
        'cpf' => '123.091.123-03',
        'birth_date' => '2012-02-01',
        'vaccine_id' => '0',
        'unit_id' => '',
        'employee_id' => '6',
        'unit_id' => '1',
        'is_active' => '1',
    ],
    [
        'id' => '24',
        'name' => 'João',
        'last_name' => 'Siqueira Maciel',
        'cpf' => '321.234.777-99',
        'birth_date' => '2020-12-10',
        'vaccine_id' => '0',
        'unit_id' => '',
        'employee_id' => '6',
        'unit_id' => '1',
        'is_active' => '1',
    ]
    ];

DB::table('dependents')->insert($dependents);

        // Units seeder
        $units = [
            
            [
                'id' => '1',
                'name' => 'Vaccine Imunizações - Rua XV de novembro, 1139 Parque Santa Monica',
                'city' => 'São Carlos/SP',
                'is_active' => '1',
            ],
            [
                'id' => '2',
                'name' => 'Saint Clair - Rua Tiradentes, 299 sala 1001 Centro',
                'city' => 'Jacareí/SP',
                'is_active' => '1',
            ],
            [
                'id' => '3',
                'name' => 'Imunecare - Av John Fitzgerald Kennedy, 1152 Jardim das Nações',
                'city' => 'Taubaté/SP',
                'is_active' => '1',
            ],
            [
                'id' => '4',
                'name' => 'Clivan Lapa - Rua Brigadeiro Gavião Peixoto, 620 Lapa',
                'city' => 'São Paulo/SP',
                'is_active' => '1',
            ],
            [
                'id' => '5',
                'name' => 'Clivan Perdizes - Rua Cotoxó, 611 sala 107 e 108',
                'city' => 'São Paulo/SP',
                'is_active' => '1',
            ],
            [
                'id' => '6',
                'name' => 'Aura VIP Serviços em Saúde - Rua José Jannarelli, 358 Vila Progredior',
                'city' => 'São Paulo/SP',
                'is_active' => '1',
            ],
            [
                'id' => '7',
                'name' => 'Amo Vacinas - Rua da Mooca, 2834, lojas 6 e 7 – Alto da Mooca',
                'city' => 'São Paulo/SP',
                'is_active' => '1',
            ],
            [
                'id' => '8',
                'name' => 'Imunocenter - Av Presidente Vargas, 135 sala 21 2.andar Vila Paraíba',
                'city' => 'Guaratinguetá/SP',
                'is_active' => '1',
            ],
            [
                'id' => '9',
                'name' => 'Spazio Med - Al Dona Assunta Barisani Tienghi, 192 – Jardim America',
                'city' => 'Sorocaba/SP',
                'is_active' => '1',
            ],
            [
                'id' => '10',
                'name' => 'Medica Vili - Rua Coronel João Dias Guimarães, 525 Vila São João',
                'city' => 'Caçapava/SP',
                'is_active' => '1',
            ],
            [
                'id' => '11',
                'name' => 'Imunizar - Av Professor Alfredo Balena, 189 sala 905 Santa Efigênia',
                'city' => 'Belo Horizonte/MG',
                'is_active' => '1',
            ],
            [
                'id' => '12',
                'name' => 'Taquaral - Rua Desembargador Campos Maia, 15 Jardim Dom Bosco',
                'city' => 'Campinas/SP',
                'is_active' => '1',
            ]
            ];

        DB::table('units')->insert($units);
    }


}
