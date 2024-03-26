@php
    use App\Models\Dependent;
    use App\Models\User;

    $dependent = Dependent::all();
    $user = User::all();

@endphp

@php
    $dependentTotalApt = 0;
    foreach ($dependent as $ds) {
        if ($ds->vaccine_id == 1 && $ds->is_active == 1 && $ds->vaccin_qtd != 0) {
            $dependentTotalApt++;
        }
    }
@endphp

@php
    $userTotalApt = 0;
    foreach ($user as $us) {
        if ($us->vaccin_confirm == 1 && $us->is_active == 1) {
            $userTotalApt++;
        }
    }
@endphp

@php
    $userTotalAptInc = 0;
    foreach ($user as $us) {
        if ($us->vaccin_confirm == 0 && $us->is_active == 1 && $us->vaccin_location_id != 0) {
            $userTotalAptInc++;
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
    $userTotalInapt = 0;
    foreach ($user as $us) {
        if ($us->vaccin_confirm == 0 && $us->is_active == 1) {
            $userTotalInapt++;
        }
    }
@endphp

@php
    $dependentTotalQuantDoses = 0;
    foreach ($dependent as $ds) {
        $dependentTotalQuantDoses += $ds->vaccin_qtd;
    }
@endphp

@php
    $dosesByDate = [];
    $dates = [];
    foreach ($dependent as $ds) {
        $date = $ds->updated_at?->format('d-m');  // alterado para 'd-m'
        if (!isset($dosesByDate[$date])) {
            $dosesByDate[$date] = $ds->vaccin_qtd;
            $dates[] = $date;
        } else {
            $dosesByDate[$date] += $ds->vaccin_qtd;
        }
    }
@endphp

@php
$userTotal = 0;
$dependentTotal = 0;

foreach ($user as $us) {
        $userTotal++;
}

foreach ($dependent as $us) {
        $dependentTotal++;  
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
                class="col-span-3 relative flex flex-col text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 shadow-md bg-clip-border rounded-xl ">
                <div class="p-6 ">

                <div class="flex justify-between mb-5">
                    <div>
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">Confirmação por período
                    </div>
                </div>

                <div id="data-labels-chart"></div>
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
                <div class="py-6" id="dependent-chart"></div>
            </div>

            <!-- Users Chart-->
            <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">

            <div class="flex justify-between items-start w-full">
                <div class="flex-col items-center">
                    <div class="flex items-center mb-1">
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">Colaboradores
                        </h5>
                    </div>
                </div>
            </div>

                <!-- Line Chart -->
                <div class="py-6" id="users-chart"></div>
            </div>
            <div
                class="col-span-2 relative flex flex-col text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 shadow-md bg-clip-border rounded-xl ">
                <div class="p-6 ">
                {{ implode(' ', .'|'.$dates) }}
                <h1>retrun</h1>
                {{ implode(' ', .'|'.$dosesByDate) }}
                    <div class="p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="stats" role="tabpanel" aria-labelledby="stats-tab">
                    <dl class="grid max-w-screen-xl grid-cols-2 gap-8 p-4 mx-auto text-gray-900 sm:grid-cols-3 xl:grid-cols-6 dark:text-white sm:p-8">
                        <div class="flex flex-col items-center justify-center">
                            <dt class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">{{ $userTotalApt }}</dt>
                            <dd class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Colaboradores Adeptos</dd>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <dt class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">{{ $userTotalInapt }}</dt>
                            <dd class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Colaboradores Inadeptos</dd>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <dt class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">{{ $userTotalAptInc }}</dt>
                            <dd class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Colaboradores sem confirmação</dd>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <dt class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">{{ $dependentTotalApt }}</dt>
                            <dd class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Dependentes Adeptos</dd>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <dt class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">{{ $dependentTotalInapt }}</dt>
                            <dd class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Dependentes Inadeptos</dd>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <dt class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">{{ $dependentTotalQuantDoses + $userTotalApt }}</dt>
                            <dd class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Doses confirmadas</dd>
                        </div>
                    </dl>
                </div>
            </div>

            <script>
                // ApexCharts options and config
                window.addEventListener("load", function() {
                    const getChartOptions = () => {
                        return {
                            series: [{{ $dependentTotalApt }}, {{ $dependentTotalInapt }}],
                            colors: ["#1A56DB", "#7E3BF2"],
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

                    if (document.getElementById("dependent-chart") && typeof ApexCharts !== 'undefined') {
                        const chart = new ApexCharts(document.getElementById("dependent-chart"), getChartOptions());
                        chart.render();
                    }
                });
            </script>

            <script>
            // ApexCharts options and config
            window.addEventListener("load", function() {
                const getChartOptions = () => {
                    return {
                        series: [{{ $userTotalApt }}, {{ $userTotalInapt }}],
                        colors: ["#1A56DB", "#7E3BF2"],
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

                if (document.getElementById("users-chart") && typeof ApexCharts !== 'undefined') {
                    const chart = new ApexCharts(document.getElementById("users-chart"), getChartOptions());
                    chart.render();
                }
            });
            </script>

            <script>
                
                const options = {
                // enable and customize data labels using the following example, learn more from here: https://apexcharts.com/docs/datalabels/
                dataLabels: {
                enabled: true,
                // offsetX: 10,
                style: {
                    cssClass: 'text-xs text-white font-medium'
                },
                },
                grid: {
                show: false,
                strokeDashArray: 4,
                padding: {
                    left: 16,
                    right: 16,
                    top: -26
                },
                },
                series: [
                {
                    name: "Designer Edition",
                    data: <?php echo json_encode(array_values($dosesByDate)); ?>,
                    color: "#7E3BF2",
                },
                ],
                chart: {
                height: "100%",
                maxWidth: "100%",
                type: "area",
                fontFamily: "Inter, sans-serif",
                dropShadow: {
                    enabled: false,
                },
                toolbar: {
                    show: false,
                },
                },
                tooltip: {
                enabled: true,
                x: {
                    show: false,
                },
                },
                legend: {
                show: true
                },
                fill: {
                type: "gradient",
                gradient: {
                    opacityFrom: 0.55,
                    opacityTo: 0,
                    shade: "#1C64F2",
                    gradientToColors: ["#1C64F2"],
                },
                },
                stroke: {
                width: 6,
                },
                xaxis: {
                categories: <?php echo json_encode($dates); ?>,
                labels: {
                    show: false,
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
                },
                yaxis: {
                show: false,
                labels: {
                    formatter: function (value) {
                    return '$' + value;
                    }
                }
                },
                }

                if (document.getElementById("data-labels-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("data-labels-chart"), options);
                chart.render();
                }

            </script>
        </div>

    </div>
</x-app-layout>
