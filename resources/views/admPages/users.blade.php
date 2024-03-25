@php
    use App\Models\Dependent;
    use App\Models\User;
    use App\Models\Unit;

    $users = Cache::remember('users', 60, function () {
        return User::where('is_admin', '!=', 1)->get();
    });
    $unit = Unit::all();

@endphp


<x-app-layout>

    <x-slot name="header">
       <div class="grid grid-flow-col auto-cols-max gap-4">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Colaboradores') }}
                </h2>
            </div>
            <div>
                <a href="{{ route('export.user') }}" class="bg-green-700 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Exportar para Excel
                </a>
            </div>
       </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white p-8">
                <div class="pb-4 bg-white dark:bg-gray-900">
                </div>
                <table class="display nowrap text-sm text-left rtl:text-right bg-white text-gray-500 dark:text-gray-400 p-8"
                    id="example">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>

                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Data de Nascimento</th>
                            <th>Matrícula/Chapa</th>
                            <th>Confirmação</th>
                            <th>Local de Vacinação</th>
                            <th>Empresa</th>
                            <th>Status</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users->chunk(100) as $chunk)
                            @foreach ($chunk as $user)
                                <tr>
                                    <td>{{ $user->name .' '. $user->last_name }}</td>
                                    <td>{{ $user->cpf }}</td>
                                    <td>{{ date('d/m/Y', strtotime($user->birth_date)) }}</td>
                                    <td>{{ $user->registration }}</td>
                                    <td>{{ $user->vaccine_confirm ? 'Adepto' : 'Inapto' }}</td>
                                    <td>{{ $user->vaccin_location_id ? $unit->find($user->vaccin_location_id)->name : 'Unidade não definida' }}</td>
                                    <td>{{ $user->unit_id ? $unit->find($user->unit_id)->name : 'Empresa não definida' }}</td>
                                    <td>{{ $user->is_active ? 'Ativo' : 'Inativo' }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                    
                </table>
            </div>

        </div>
    </div>
    </div>

    <script>
        new DataTable('#example', {
    fixedHeader: true,
    responsive: true
});
    </script>
</x-app-layout>
