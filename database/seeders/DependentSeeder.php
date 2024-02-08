<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DependentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Dependents Seeder
       $dependents = [
        [
            'id' => '22',
            'name' => 'Heitor',
            'last_name' => 'Siqueira Maciel',
            'cpf' => '604.091.078-08',
            'birth_date' => '2022-07-18',
            'vaccine_id' => '1',
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
            'vaccine_id' => '2',
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
            'vaccine_id' => '1',
            'employee_id' => '6',
            'unit_id' => '1',
            'is_active' => '1',
        ]
        ];

    DB::table('dependents')->insert($dependents);
    }
}
