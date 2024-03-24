@php
    use App\Models\Dependent;
    use App\Models\User;
    use App\Models\Unit;

    $dependents = Dependent::all();

@endphp


<x-app-layout>

    <x-slot name="header">
        <div class="grid grid-flow-col auto-cols-max gap-4">
             <div>
                 <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                     {{ __('Dependentes') }}
                 </h2>
             </div>
             <div>
                 <a href="{{ route('export.dependent') }}" class="bg-green-700 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
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
                <table
                    class="display nowrap text-sm text-left rtl:text-right bg-white text-gray-500 dark:text-gray-400 p-8"
                    id="example">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                    @foreach ($dependents->chunk(100) as $chunk)
                        @foreach ($chunk as $dependent)
                            <tr>
                                <td>{{ $dependent->name . ' ' . $dependent->last_name }}</td>
                                <td>{{ $dependent->cpf }}</td>
                                <td>{{ date('d/m/Y', strtotime($dependent->birth_date)) }}</td>
                                <td>{{ $dependent->vaccine_id ? 'Adepto' : 'Inapto' }}</td>
                                <td>{{ $dependent->vaccin_qtd }}</td>
                                <td>{{ $dependent->employee_id }}</td>
                                <td>{{ $dependent->vaccin_location_id }}</td>
                                <td>{{ $dependent->is_active ? 'Ativo' : 'Inativo' }}</td>
                            </tr>
                        @endforeach
                    @endforeach

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
