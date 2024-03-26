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
                class="relative flex flex-col text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 shadow-md bg-clip-border rounded-xl ">
                <div class="p-6 ">

                    <h5
                        class="block mb-5 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900 cursor-default">
                        {{ __('Resumo base') }}
                    </h5>
                    <p
                        class="block font-sans text-md antialiased font-light leading-relaxed text-inherit cursor-default">

                        Total colaboradores: {{ $userTotal }}<br>
                        Total dependentes: {{ $dependentTotal }}<br><br>

                        Dependentes adeptos: {{ $dependentTotalApt }}<br>
                        Dependentes inadeptos: {{ $dependentTotalInapt }}<br>
                        Total de doses dos dependentes: {{ $dependentTotalQuantDoses }}<br><br>

                        Colaboradores adeptos: {{ $userTotalApt }}<br>
                        Colaboradores inadeptos: {{ $userTotalInapt }}<br>
                        Colaboradores adeptos sem confirmação: {{ $userTotalAptInc }}<br>

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
            
            <!-- Data Label -->
            <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
            <div class="flex justify-between mb-5">
                <div>
                <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">$12,423</h5>
                <p class="text-base font-normal text-gray-500 dark:text-gray-400">Sales this week</p>
                </div>
                <div
                class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                23%
                <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
                </svg>
                </div>
            </div>
            <div id="data-labels-chart"></div>
            <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between mt-5">
                <div class="flex justify-between items-center pt-5">
                <!-- Button -->
                <button
                    id="dropdownDefaultButton"
                    data-dropdown-toggle="lastDaysdropdown"
                    data-dropdown-placement="bottom"
                    class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                    type="button">
                    Last 7 days
                    <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="lastDaysdropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
                        </li>
                        <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
                        </li>
                        <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 7 days</a>
                        </li>
                        <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 30 days</a>
                        </li>
                        <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 90 days</a>
                        </li>
                    </ul>
                </div>
                <a
                    href="#"
                    class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                    Sales Report
                    <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                </a>
                </div>
            </div>
            </div>


            <script>
                // ApexCharts options and config
                window.addEventListener("load", function() {
                    const getChartOptions = () => {
                        return {
                            series: [{{ $dependentTotalApt }}, {{ $dependentTotalInapt }}],
                            colors: ["#1DBB0B", "#FF3408"],
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
                    name: "Developer Edition",
                    data: [150, 141, 145, 152, 135, 125],
                    color: "#1A56DB",
                },
                {
                    name: "Designer Edition",
                    data: [64, 41, 76, 41, 113, 173],
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
                categories: ['01 February', '02 February', '03 February', '04 February', '05 February', '06 February', '07 February'],
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
