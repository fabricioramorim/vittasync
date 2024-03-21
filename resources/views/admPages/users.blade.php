@php
    use App\Models\Dependent;
    use App\Models\User;
    use App\Models\Unit;

    $dependent = Dependent::all();
    $user = User::where('is_admin', '!=', 1)->get();
    $unit = Unit::all();

@endphp


<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Colaboradores') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white p-8">
                <div class="pb-4 bg-white dark:bg-gray-900">
                </div>
                <table class="w-full text-sm text-left rtl:text-right bg-white text-gray-500 dark:text-gray-400 p-8"
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
                        @php
                        foreach ($user as $rs) {
                            echo "<tr>";
                            echo "<td>" . $rs->name . $rs->last_name . "</td>";
                            echo "<td>" . $rs->cpf . "</td>";
                            echo "<td>" . date('d/m/Y', strtotime($rs->birth_date)) . "</td>";
                            echo "<td>" . $rs->registration . "</td>";
                            echo "<td>";
                            if ($rs->vaccin_confirm == 1) {
                                echo "Adepto";
                            } else {
                                echo "Inapto";
                            }
                            echo "</td>";
                        
                            $unitRel = Unit::find($rs->vaccin_location_id);
                                        
                            if ($unitRel) {
                                echo "<td>" . $unitRel->name . "</td>";
                            } else {
                                echo "<td>Unidade não definida</td>";
                            }

                            $unitCorp = Unit::find($rs->unit_id);
                                        
                            if ($unitCorp) {
                                echo "<td>" . $unitCorp->name . "</td>";
                            } else {
                                echo "<td>Empresa não definida</td>";
                            }
                                                  
                            echo "<td>";
                                if ($rs->is_active == 1) {
                                    echo "Ativo";
                                } else {
                                    echo "Inativo";
                                }
                            echo "</td>";

                            echo "</tr>";
                        }
                        @endphp

                    </tbody>
                    
                </table>
            </div>

        </div>
    </div>
    </div>

    <script>
        new DataTable('#example', {
            layout: {
                topStart: {
                    buttons: ['Exportar CSV', 'Exportar Excel', 'Exportar PDF']
                }
            }
        });    
    </script>


    <script></script>
</x-app-layout>
