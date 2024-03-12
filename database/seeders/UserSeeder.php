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
            ('100', 'VICTOR HUGO GODOI', 'PEDROTA', '511.835.148-08', '2001-08-03', 'E00037', 'não informado', '00000-00', 'não informado', '0', '0', '1', '0', '0', '31', 'not@email.com', '".now()."', '".Hash::make('03082001')."', '".Str::random(10)."'),
            ('101', 'ARTHUR QUEIROZ', 'RAMOS', '070.262.761-58', '1999-12-02', 'E00045', 'não informado', '00000-00', 'não informado', '0', '0', '1', '0', '0', '31', 'not@email.com', '".now()."', '".Hash::make('02121999')."', '".Str::random(10)."'),
            ('102', 'ANDREI', 'FREIBERGER', '110.604.739-76', '1999-01-19', 'E00047', 'não informado', '00000-00', 'não informado', '0', '0', '1', '0', '0', '31', 'not@email.com', '".now()."', '".Hash::make('19011999')."', '".Str::random(10)."'),
            ('103', 'LUCA AUGUSTO', 'PANIAGO', '489.969.238-26', '2003-03-27', 'E00048', 'não informado', '00000-00', 'não informado', '0', '0', '1', '0', '0', '31', 'not@email.com', '".now()."', '".Hash::make('27032003')."', '".Str::random(10)."'),
            ('104', 'DEBORA CAIRES DE SOUZA', 'MOREIRA', '736.782.011-72', '1999-03-31', 'E00049', 'não informado', '00000-00', 'não informado', '0', '0', '1', '0', '0', '31', 'not@email.com', '".now()."', '".Hash::make('31031999')."', '".Str::random(10)."'),
            ('105', 'JOAO PEDRO FALCAO DA', 'SILVA', '617.273.623-06', '2000-02-06', 'E00052', 'não informado', '00000-00', 'não informado', '0', '0', '1', '0', '0', '31', 'not@email.com', '".now()."', '".Hash::make('06022000')."', '".Str::random(10)."');
        ");
    }
}