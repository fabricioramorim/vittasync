@php
    use App\Models\Dependent;
    use App\Models\User;

    $dependent = Dependent::all();
    $user = User::all();

@endphp

@php
    $dependentTotalApt = 0;
    foreach ($dependent as $ds) {
        if ($ds->vaccine_id == 1 && $ds->is_active == 1) {
            $dependentTotalApt++;
        }
    }
@endphp

@php
    $dependentTotalInapt = 0;
    foreach ($dependent as $ds) {
        if ($ds->vaccine_id == 0 && $ds->is_active == 1) {
            $dependentTotalInapt++;
        }
    }
@endphp

@php
    $dependentTotalQuantDoses = 0;
    foreach ($dependent as $ds) {
        $dependentTotalQuantDoses += $ds->vaccin_qtd;
    }
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
       
        <div class="grid grid-cols-3 gap-8 max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
            <div
                class="relative flex flex-col text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 shadow-md bg-clip-border rounded-xl ">
                <div class="p-6 ">

                    <h5
                        class="block mb-5 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900 cursor-default">
                        {{ __('Colaboradores confirmados') }}
                    </h5>
                    <p
                        class="block font-sans text-md antialiased font-light leading-relaxed text-inherit cursor-default">

                        @php
                            $confirmed = 0;
                            $dependentTotalApt = 0;
                            foreach ($user as $us) {
                                    $confirmed++;
                                
                            }

                            foreach ($dependent as $us) {
                                    $dependentTotalApt++;
                                
                            }
                        @endphp

                        Total: {{ $confirmed }}
                        Dependentes: {{ $dependentTotalApt }}

                        Dependentes Adeptos: {{ $dependentTotalApt }}
                        Dependentes Inadeptos: {{ $dependentTotalInapt }}

                    </p>
                </div>
            </div>
            <div
                class="relative flex flex-col text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 shadow-md bg-clip-border rounded-xl ">
                <div class="p-6 ">

                    <h5
                        class="block mb-5 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900 cursor-default">
                        {{ __('Colaboradores Pendentes') }}
                    </h5>
                    <p
                        class="block font-sans text-md antialiased font-light leading-relaxed text-inherit cursor-default">

                        @php
                            $confirmed = 0;
                            foreach ($user as $us) {
                                if ($us->is_admin == 0 && $us->vaccin_confirm == 0 && $us->is_active == 1) {
                                    $confirmed++;
                                }
                            }
                        @endphp

                        Total: {{ $confirmed }}

                    </p>
                </div>
            </div>

            
            <!-- Dependents Chart-->
            <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">

                <div class="flex justify-between items-start w-full">
                    <div class="flex-col items-center">
                        <div class="flex items-center mb-1">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">Dependentes
                            </h5>
                        </div>
                    </div>
                </div>

                <!-- Line Chart -->
                <div class="py-6" id="pie-chart"></div>
            </div>

            <script>
                // ApexCharts options and config
                window.addEventListener("load", function() {
                    const getChartOptions = () => {
                        return {
                            series: [{{ $dependentTotalApt }}, {{ $dependentTotalInapt }}],
                            colors: ["#1C64F2", "#EF0000"],
                            chart: {
                                height: 420,
                                width: "100%",
                                type: "pie",
                            },
                            stroke: {
                                colors: ["white"],
                                lineCap: "",
                            },
                            plotOptions: {
                                pie: {
                                    labels: {
                                        show: true,
                                    },
                                    size: "100%",
                                    dataLabels: {
                                        offset: -25
                                    }
                                },
                            },
                            labels: ["Adeptos", "Inadeptos"],
                            dataLabels: {
                                enabled: true,
                                style: {
                                    fontFamily: "Inter, sans-serif",
                                },
                            },
                            legend: {
                                position: "bottom",
                                fontFamily: "Inter, sans-serif",
                            },
                            yaxis: {
                                labels: {
                                    formatter: function(value) {
                                        return value
                                    },
                                },
                            },
                            xaxis: {
                                labels: {
                                    formatter: function(value) {
                                        return value
                                    },
                                },
                                axisTicks: {
                                    show: false,
                                },
                                axisBorder: {
                                    show: false,
                                },
                            },
                        }
                    }

                    if (document.getElementById("pie-chart") && typeof ApexCharts !== 'undefined') {
                        const chart = new ApexCharts(document.getElementById("pie-chart"), getChartOptions());
                        chart.render();
                    }
                });
            </script>


        </div>

    </div>
</x-app-layout>
