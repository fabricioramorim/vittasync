<?php

namespace App\Exports;

use App\Models\Dependent;
use App\Models\User;
use App\Models\Unit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportDependent implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        ini_set('max_execution_time', 3600);
        return Dependent::get()->map(function ($dependent) {
            $unit = Unit::all();
            $user = User::all();
            return [
                'name' => $dependent->name . ' ' . $dependent->last_name,
                'cpf' => $dependent->cpf,
                'birth_date' => date('d/m/Y', strtotime($dependent->birth_date)),
                'vaccine_id' => $dependent->vaccine_id ? 'Adepto' : 'Inapto',
                'vaccin_qtd' => $dependent->vaccin_qtd,
                'employee_id' => $dependent->employee_id,
                'employee_id_name' => $dependent->employee_id ? $user->where('registration', $dependent->employee_id)->first()->name . ' ' . $user->where('registration', $dependent->employee_id)->first()->last_name : 'Titular não encontrado',
                'vaccin_location_id' => $dependent->vaccin_location_id ? $unit->find($dependent->vaccin_location_id)->name : 'Unidade não definida',
                'is_active' => $dependent->is_active ? 'Ativo' : 'Inativo',
            ];
        });
    }
    public function headings(): array
    {
        return [
            'Nome',
            'CPF',
            'Data de Nascimento',
            'Confirmação de Vacina',
            'Quantidade de Doses',
            'Matrícula/Chapa do Titular',
            'Nome do Titular',
            'Local de Vacinação',
            'Status',
        ];
    }
}
