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
/* DB::table('accesses')->insert([
    'id' => '0',
    'date_access' => '2024-03-11',
    'date_access_end' => '2024-03-22',
]);*/

// Users seeder
$users = [
    [
        'id' => '7788994455',
        'name' => 'RAMIRO',
        'last_name' => 'ORTIGOSO',
        'cpf' => '120.290.478-56',
        'birth_date' => '1968-12-09',
        'registration' => 'RAMIRO',
        'phone' => '+551100000000',
        'cep' => '06766200',
        'address' => 'Rua João de Barros, 100',
        'number' => '100',
        'is_admin' => '1',
        'is_active' => '1',
        'vaccine_id' => '0',
        'vaccin_confirm' => '0',
        'unit_id' => '1',
        'email' => 'email@email.com',
        'email_verified_at' => now(),
        'password' => Hash::make('Vacivitta@123'),
        'remember_token' => Str::random(10),
    ],
    [
        'id' => '7788994456',
        'name' => 'MARIA TERESA',
        'last_name' => 'RIBEIRO',
        'cpf' => '316.363.128-29A',
        'birth_date' => '1983-04-19',
        'registration' => 'EMBRAER',
        'phone' => '+551100000000',
        'cep' => '06766200',
        'address' => 'Rua João de Barros, 100',
        'number' => '100',
        'is_admin' => '1',
        'is_active' => '1',
        'vaccine_id' => '0',
        'vaccin_confirm' => '0',
        'unit_id' => '1',
        'email' => 'email@email.com',
        'email_verified_at' => now(),
        'password' => Hash::make('Vacivitta'),
        'remember_token' => Str::random(10),
    ]
];

DB::table('users')->insert($users);

// Dependents Seeder
/*$dependents = [
    
];

DB::table('dependents')->insert($dependents);*/

        // Units seeder
        /*$units = [
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
                'city' => null,
                'is_active' => '1',
                'is_corp' => '1',
            ],
            [
                'id' => '31',
                'name' => 'Visiona Tecnologia Espacial S.A.',
                'city' => null,
                'is_active' => '1',
                'is_corp' => '1',
            ],
            [
                'id' => '32',
                'name' => 'Atech',
                'city' => null,
                'is_active' => '1',
                'is_corp' => '1',
            ],
            [
                'id' => '33',
                'name' => 'ELEB',
                'city' => null,
                'is_active' => '1',
                'is_corp' => '1',
            ],
            [
                'id' => '34',
                'name' => 'EMBRAERPREV',
                'city' => null,
                'is_active' => '1',
                'is_corp' => '1',
            ],
            [
                'id' => '35',
                'name' => 'EVE',
                'city' => null,
                'is_active' => '1',
                'is_corp' => '1',
            ],
            ];

        DB::table('units')->insert($units);*/
    }


}