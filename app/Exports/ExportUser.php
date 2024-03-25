<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Unit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportUser implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        ini_set('max_execution_time', 360);
        return User::where('is_admin', 0)->get()->map(function ($user) {
            $unit = Unit::all();
            return [
                'name' => $user->name . ' ' . $user->last_name,
                'cpf' => $user->cpf,
                'birth_date' => date('d/m/Y', strtotime($user->birth_date)),
                'registration' => $user->registration,
                'vaccin_confirm' => $user->vaccin_confirm ? 'Adepto' : 'Inapto',
                'unit_id' => $user->unit_id ? $unit->find($user->unit_id)->name : 'Empresa não definida',
                'vaccin_location_id' => $user->vaccin_location_id ? $unit->find($user->vaccin_location_id)->name : 'Unidade não definida',
                'is_active' => $user->is_active ? 'Ativo' : 'Inativo',
            ];
        });
    }
    public function headings(): array
    {
        return [
            'Nome',
            'CPF',
            'Data de Nascimento',
            'Matrícula/Chapa',
            'Confirmação de Vacina',
            'Empresa',
            'Local de Vacinação',
            'Status',
        ];
    }
    public function chunkSize(): int
    {
        return 1000;
    }
}
