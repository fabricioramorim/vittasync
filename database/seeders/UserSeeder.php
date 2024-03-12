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
        DB::unprepared("
            INSERT INTO users (id, name, last_name, cpf, birth_date, registration, phone, cep, address, number, is_admin, is_active, vaccine_id, vaccin_confirm, unit_id, email, email_verified_at, password, remember_token) VALUES
            ('100', 'VICTOR HUGO GODOI', 'PEDROTA', '511.835.148-08', '2001-08-03', 'E00037', 'não informado', '00000-00', 'não informado', '0', '0', '1', '0', '0', '31', 'not@email.com', '".now()."', '".Hash::make('03082001')."', '".Str::random(10)."');
        ");
    }
}