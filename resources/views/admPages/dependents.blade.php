@php
    use App\Models\Dependent;
    use App\Models\User;
    use App\Models\Unit;

    $dependents = Cache::remember('dependents', 60, function () {
        return Dependent::all();
    });
    $user = User::all();
    $unit = Unit::all();

@endphp


<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dependentes') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white p-8">
                <div class="pb-4 bg-white dark:bg-gray-900">
                </div>
                <table class="table-fixed"
                    id="example">
                    <thead>
                        <tr>

                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Data de Nascimento</th>
                            <th>Confirmação</th>
                            <th>Quantidade de Doses</th>
                            <th>Matrícula/Chapa Titular</th>
                            <th>Local de Vacinação</th>
                            <th>Status</th>

                        </tr>
                    </thead>
                    @foreach ($dependents as $dependent)
                        <tr>
                            <td>{{ $dependent->name . ' ' . $dependent->last_name }}</td>
                            <td>{{ $dependent->cpf }}</td>
                            <td>{{ date('d/m/Y', strtotime($dependent->birth_date)) }}</td>
                            <td>{{ $dependent->vaccine_id ? 'Adepto' : 'Inapto' }}</td>
                            <td>{{ $dependent->vaccin_qtd }}</td>
                            <td>{{ $dependent->employee_id }}</td>
                            <td>{{ $dependent->vaccin_location_id ? $unit->find($dependent->vaccin_location_id)->name : 'Unidade não definida' }}</td>
                            <td>{{ $dependent->is_active ? 'Ativo' : 'Inativo' }}</td>
                        </tr>
                    @endforeach

                </table>
            </div>

        </div>
    </div>
    </div>

</x-app-layout>
