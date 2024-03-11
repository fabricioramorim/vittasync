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
    'date_access' => '2024-03-11',
    'date_access_end' => '2024-03-22',
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
        'is_admin' => '1',
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
        'id' => '482964',
        'name' => 'Edneia',
        'last_name' => 'de Fatima Siqueira Maciel',
        'cpf' => '396.897.488-31',
        'birth_date' => '1991-03-14',
        'registration' => '482964',
        'phone' => '+5511953704921',
        'cep' => '06766200',
        'address' => 'Rua João de Barros, 100',
        'number' => '100',
        'is_admin' => '0',
        'is_active' => '1',
        'vaccine_id' => '0',
        'vaccin_confirm' => '0',
        'unit_id' => '0',
        'email' => 'email@email.com',
        'email_verified_at' => now(),
        'password' => Hash::make('14031991'),
        'remember_token' => Str::random(10),
    ],
    [
        'id' => '7',
        'name' => 'Flavia',
        'last_name' => 'Cristina dos Santos',
        'cpf' => '340.610.038-44',
        'birth_date' => '1984-08-08',
        'registration' => '524196',
        'phone' => '+5511900000000',
        'cep' => '00000000',
        'address' => 'Rua João de Barros',
        'number' => '100',
        'is_admin' => '0',
        'is_active' => '1',
        'vaccine_id' => '0',
        'vaccin_confirm' => '0',
        'unit_id' => '0',
        'email' => 'email@email.com',
        'email_verified_at' => now(),
        'password' => Hash::make('08081984'),
        'remember_token' => Str::random(10),
    ],
    [
        'id' => '8',
        'name' => 'Maria Teresa',
        'last_name' => 'Ribeiro',
        'cpf' => '316.363.128-29',
        'birth_date' => '1983-04-19',
        'registration' => '333362',
        'phone' => '+5511900000000',
        'cep' => '00000000',
        'address' => 'Rua João de Barros',
        'number' => '100',
        'is_admin' => '0',
        'is_active' => '1',
        'vaccine_id' => '0',
        'vaccin_confirm' => '0',
        'unit_id' => '0',
        'email' => 'email@email.com',
        'email_verified_at' => now(),
        'password' => Hash::make('19041983'),
        'remember_token' => Str::random(10),
    ],
    [
        'id' => '9',
        'name' => 'Marta de Cassia',
        'last_name' => 'Araujo Trombini',
        'cpf' => '315.839.248-84',
        'birth_date' => '1986-12-03',
        'registration' => '470053',
        'phone' => '+5511900000000',
        'cep' => '00000000',
        'address' => 'Rua João de Barros',
        'number' => '100',
        'is_admin' => '0',
        'is_active' => '1',
        'vaccine_id' => '0',
        'vaccin_confirm' => '0',
        'unit_id' => '0',
        'email' => 'email@email.com',
        'email_verified_at' => now(),
        'password' => Hash::make('03121986'),
        'remember_token' => Str::random(10),
    ],
    [
        'id' => '10',
        'name' => 'Juliene Cristina',
        'last_name' => 'Capaz Jesuino',
        'cpf' => '253.977.938-76',
        'birth_date' => '1978-05-10',
        'registration' => '734044',
        'phone' => '+5511900000000',
        'cep' => '00000000',
        'address' => 'Rua João de Barros',
        'number' => '100',
        'is_admin' => '0',
        'is_active' => '1',
        'vaccine_id' => '0',
        'vaccin_confirm' => '0',
        'unit_id' => '0',
        'email' => 'email@email.com',
        'email_verified_at' => now(),
        'password' => Hash::make('10051978'),
        'remember_token' => Str::random(10),
    ],
    [
        'id' => '11',
        'name' => 'Andrea Cristina',
        'last_name' => 'dos Santos Ferreira',
        'cpf' => '185.702.028-65',
        'birth_date' => '1976-02-04',
        'registration' => '411103',
        'phone' => '+5511900000000',
        'cep' => '00000000',
        'address' => 'Rua João de Barros',
        'number' => '100',
        'is_admin' => '0',
        'is_active' => '1',
        'vaccine_id' => '0',
        'vaccin_confirm' => '0',
        'unit_id' => '0',
        'email' => 'email@email.com',
        'email_verified_at' => now(),
        'password' => Hash::make('04021976'),
        'remember_token' => Str::random(10),
    ],
    [
        'id' => '12',
        'name' => 'Adriele da Costa',
        'last_name' => 'Vilalta Schneider',
        'cpf' => '367.760.468-08',
        'birth_date' => '1991-10-08',
        'registration' => '489996',
        'phone' => '+5511900000000',
        'cep' => '00000000',
        'address' => 'Rua João de Barros',
        'number' => '100',
        'is_admin' => '0',
        'is_active' => '1',
        'vaccine_id' => '0',
        'vaccin_confirm' => '0',
        'unit_id' => '0',
        'email' => 'email@email.com',
        'email_verified_at' => now(),
        'password' => Hash::make('08101991'),
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
        'employee_id' => '482964',
        'unit_id' => '0',
        'is_active' => '1',
    ],
    [
        'id' => '23',
        'name' => 'Maria Clara',
        'last_name' => 'Ribeiro Flausino',
        'cpf' => '563.090.178-88',
        'birth_date' => '2010-09-21',
        'vaccine_id' => '0',
        'employee_id' => '482964',
        'unit_id' => '0',
        'is_active' => '1',
    ],
    [
        'id' => '24',
        'name' => 'Adilson Candido',
        'last_name' => 'Rodrigues',
        'cpf' => '183.836.358-00',
        'birth_date' => '1975-11-20',
        'vaccine_id' => '0',
        'employee_id' => '8',
        'unit_id' => '0',
        'is_active' => '1',
    ],
    [
        'id' => '25',
        'name' => 'Leonardo Trombini',
        'last_name' => 'de Oliveira',
        'cpf' => '569.781.988-97',
        'birth_date' => '2015-07-20',
        'vaccine_id' => '0',
        'employee_id' => '9',
        'unit_id' => '0',
        'is_active' => '1',
    ],
    [
        'id' => '26',
        'name' => 'Guilherme Henrique',
        'last_name' => 'Trombini da Silva',
        'cpf' => '136.236.886-57',
        'birth_date' => '2003-01-31',
        'vaccine_id' => '0',
        'employee_id' => '9',
        'unit_id' => '0',
        'is_active' => '1',
    ],
    [
        'id' => '27',
        'name' => 'Thiago',
        'last_name' => 'Capaz Jesuino',
        'cpf' => '532.415.018-50',
        'birth_date' => '2017-07-18',
        'vaccine_id' => '0',
        'employee_id' => '10',
        'unit_id' => '0',
        'is_active' => '1',
    ],
    [
        'id' => '28',
        'name' => 'Matheus',
        'last_name' => 'Capaz Jesuino',
        'cpf' => '462.714.298-66',
        'birth_date' => '2011-08-23',
        'vaccine_id' => '0',
        'employee_id' => '10',
        'unit_id' => '0',
        'is_active' => '1',
    ],
    [
        'id' => '29',
        'name' => 'Fernando Cesar',
        'last_name' => 'Jesuino',
        'cpf' => '191.493.258-76',
        'birth_date' => '1976-04-28',
        'vaccine_id' => '0',
        'employee_id' => '10',
        'unit_id' => '0',
        'is_active' => '1',
    ],
    [
        'id' => '30',
        'name' => 'Lais dos Santos',
        'last_name' => 'Ferreira',
        'cpf' => '548.080.398-00',
        'birth_date' => '2010-08-25',
        'vaccine_id' => '0',
        'employee_id' => '11',
        'unit_id' => '0',
        'is_active' => '1',
    ],
    [
        'id' => '31',
        'name' => 'Cassiano Dimitry',
        'last_name' => 'Ferreira Filho',
        'cpf' => '548.080.018-37',
        'birth_date' => '2006-01-03',
        'vaccine_id' => '0',
        'employee_id' => '11',
        'unit_id' => '0',
        'is_active' => '1',
    ],
    [
        'id' => '32',
        'name' => 'Cassiano Dimitry',
        'last_name' => 'Ferreira',
        'cpf' => '258.648.068-62',
        'birth_date' => '1975-09-02',
        'vaccine_id' => '0',
        'employee_id' => '11',
        'unit_id' => '0',
        'is_active' => '1',
    ],
    [
        'id' => '33',
        'name' => 'Douglas Nery',
        'last_name' => 'Schneider',
        'cpf' => '395.651.028-32',
        'birth_date' => '1989-05-08',
        'vaccine_id' => '0',
        'employee_id' => '12',
        'unit_id' => '0',
        'is_active' => '1',
    ]
];

DB::table('dependents')->insert($dependents);

        // Units seeder
        $units = [
            [
                'id' => '10',
                'name'=> 'Rotary Club',
                'city' => 'Araraquara/SP',
                'is_active' => '1',
                'is_corp' => '0',
            ],
            [
                'id' => '11',
                'name' => 'Colégio Embraer',
                'city' => 'Botucatu/SP',
                'is_active' => '1',
                'is_corp' => '0',
            ],
            [
                'id' => '12',
                'name' => 'Estacionamento Ozires Silva',
                'city' => 'São José dos Campos/SP',
                'is_active' => '1', 
                'is_corp' => '0',
            ],
            [
                'id' => '13',
                'name' => 'Clínica Imunizar - Av Professor Alfredo Balena, 189 sala 905 Santa Efigênia',
                'city' => 'Belo Horizonte/MG',
                'is_active' => '1',
                'is_corp' => '0',
            ],
            [
                'id' => '14',
                'name' => 'Clínica Medica Vili - Rua Coronel João Dias Guimarães, 525 Vila São João',
                'city' => 'Caçapava/SP',
                'is_active' => '1',
                'is_corp' => '0',
            ],
            [
                'id' => '15',
                'name' => 'Clínica Dr Vacina - Av. José Bonifácio, 306 - Jardim das Paineiras',
                'city' => 'Campinas/SP',
                'is_active' => '1',
                'is_corp' => '0',
            ],
            [
                'id' => '16',
                'name' => 'Clínica Imunocenter - Av Presidente Vargas, 135 sala 21 Vila Paraíba',
                'city' => 'Guaratinguetá/SP',
                'is_active' => '1',
                'is_corp' => '0',
            ],
            [
                'id' => '17',
                'name' => 'Clínica Saint Clair - Rua Tiradentes, 299 sala 1001 Centro',
                'city' => 'Jacareí/SP',
                'is_active' => '1',
                'is_corp' => '0',
            ],
            [
                'id' => '18',
                'name' => 'Clínica Previmune - Rua Padre Teixeira, 1743 - Centro',
                'city' => 'São Carlos/SP',
                'is_active' => '1',
                'is_corp' => '0',
            ],
            [
                'id' => '19',
                'name' => 'Clínica Vacivitta - Rua Nicolau de Souza Queiroz, 177 - Vila Mariana',
                'city' => 'São Paulo/SP',
                'is_active' => '1',
                'is_corp' => '0',
            ],
            [
                'id' => '20',
                'name' => 'Clínica Imunobaby Belenzinho - R. Pimenta Bueno, 278 - Chácara Tatuapé',
                'city' => 'São Paulo/SP',
                'is_active' => '1',
                'is_corp' => '0',
            ],
            [
                'id' => '21',
                'name' => 'Clínica Aura VIP Serviços em Saúde - Rua José Jannarelli, 358 Vila Progredior',
                'city' => 'São Paulo/SP',
                'is_active' => '1',
                'is_corp' => '0',
            ],
            [
                'id' => '22',
                'name' => 'Clínica Amo Vacinas - Rua da Mooca, 2834, lojas 6 e 7 – Alto da Mooca',
                'city' => 'São Paulo/SP',
                'is_active' => '1',
                'is_corp' => '0',
            ],
            [
                'id' => '23',
                'name' => 'Clínica Clivan Perdizes - Rua Coxotó, 611 sala 107 e 108',
                'city' => 'São Paulo/SP',
                'is_active' => '1',
                'is_corp' => '0',
            ],
            [
                'id' => '24',
                'name' => 'Clínica Clivan Lapa - Rua Brigadeiro Gavião Peixoto, 620 Lapa',
                'city' => 'São Paulo/SP',
                'is_active' => '1',
                'is_corp' => '0',
            ],
            [
                'id' => '25',
                'name' => 'Clínica Spazio Med - Al Dona Assunta Barisani Tienghi, 192 – Jardim América',
                'city' => 'Sorocaba/SP',
                'is_active' => '1',
                'is_corp' => '0',
            ],
            [
                'id' => '26',
                'name' => 'Clínica Leve Vida - RUA DR. JORGE FERREIRA DA MOTTA, 79 CHÁC. GUISARD',
                'city' => 'Taubaté/SP',
                'is_active' => '1',
                'is_corp' => '0',
            ],
            [
                'id' => '30',
                'name' => 'Embraer',
                'city' => 'São José dos Campos/SP',
                'is_active' => '1',
                'is_corp' => '1',
            ],
            ];

        DB::table('units')->insert($units);
    }


}
