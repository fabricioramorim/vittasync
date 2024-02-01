<x-app-layout>

    <!-- Header -->
    <x-slot name="header">

        <h2
            class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-between ml-1 mr-2 items-center">
            {{ __('VittaSync - Dependentes') }}
            <div class="grid grid-cols-6 grid-rows-1  items-center">
                @php
                    $access = new \Carbon\Carbon($access->where('id', 1)->get('date_access'));
                @endphp
                @if ($access >= \Carbon\Carbon::now()->subDays(7))
                    @if (Auth::user()->vaccin_confirm == 0)
                        <div class="col-end-4 col-span-2">
                            <form action="{{ route('register.confirm', ['confirm' => Auth::user()->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <input type="hidden" name="vaccin_confirm" value="1">
                                <button type="submit"
                                    class=" text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-3 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Confirmar
                                    Vacinação</button>
                            </form>
                        </div>

                        <div class="col-end-6 col-span-2">
                            <a data-modal-target="registerD-modal" data-modal-toggle="registerD-modal"
                                class="cursor-pointer relative inline-flex items-center justify-center p-0.5 me-4 overflow-hidden text-sm font-medium text-gray-800 dark:text-white rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
                                <span
                                    class="cursor-pointer relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-800 rounded-md group-hover:bg-opacity-0">
                                    <div class="inline-flex items-center align-middle">
    
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-4 h-4 me-2">
                                            <path
                                                d="M5.25 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM2.25 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM18.75 7.5a.75.75 0 0 0-1.5 0v2.25H15a.75.75 0 0 0 0 1.5h2.25v2.25a.75.75 0 0 0 1.5 0v-2.25H21a.75.75 0 0 0 0-1.5h-2.25V7.5Z" />
                                        </svg>
    
                                        {{ __('Incluir Dependente') }}
                                    </div>
                                </span>
                            </a>
                        </div>
                    @else
                        <div class="col-end-6 col-span-2">
                            <form action="{{ route('register.confirm', ['confirm' => Auth::user()->id]) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="vaccin_confirm" value="0">
                                <button type="submit"
                                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-3 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Desfazer
                                    Confirmação</button>
                            </form>
                        </div>
                    @endif

                    
                @endif
                <div class="col-end-8 col-span-2 mb-1">
                    <a href="{{ asset('bula_vaxigrip_tetra.pdf') }}" download="bula_vaxigrip_tetra.pdf"
                        class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Baixar
                        Bula</a>
                </div>
            </div>
        </h2>
    </x-slot>

    <!-- Alert message from controller store -->
    @if (session()->has('message') && session()->get('type') == 'danger')
        <div x-data="{ show: true }" x-init="ssetTimeout(() => show = false, 5000)" x-show="show">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
                <div role="alert">
                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                        Erro
                    </div>
                    <div
                        class="border border-t-0 border-red-400 rounded-b bg-white dark:bg-gray-800 px-4 py-3 text-gray-900 dark:text-gray-100">
                        {{ session()->get('message') }}
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (session()->has('message') && session()->get('type') == 'success')
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
                <div role="alert">
                    <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
                        Erro
                    </div>
                    <div
                        class="border border-t-0 border-green-400 rounded-b bg-white dark:bg-gray-800 px-4 py-3 text-gray-900 dark:text-gray-100">
                        {{ session()->get('message') }}
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Alert top -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-8">
        <div role="alert">
            <div class="bg-yellow-500 text-white font-bold rounded-t px-4 py-2">
                Atenção!
            </div>
            <div
                class="border border-t-0 border-yellow-400 rounded-b bg-white dark:bg-gray-800 px-4 py-3 text-gray-900 dark:text-gray-100">
                {{ __('A vacina aplicada será descontada em folha de pagamento.') }}
            </div>
        </div>
    </div>

    <!-- List of dependents -->
    <div class="grid grid-cols-3 gap-4 max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">

        @if ($dependent->count() > 0)
            @foreach ($dependent as $rs)
                <div
                    class="relative flex flex-col text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 shadow-md bg-clip-border rounded-xl w-96">
                    <div class="p-6">
                        <div class="grid grid-rows-3 grid-flow-col gap-4">
                            <div class="w-20 h-20 row-span-3">
                                <svg xmlns="http://www.w3.org/2000/svg" height="60" fill="currentColor"
                                    viewBox="0 -960 960 960" width="60">
                                    <path
                                        d="m320-60-80-60v-160h-40q-33 0-56.5-23.5T120-360v-300q-17 0-28.5-11.5T80-700q0-17 11.5-28.5T120-740h120v-60h-20q-17 0-28.5-11.5T180-840q0-17 11.5-28.5T220-880h120q17 0 28.5 11.5T380-840q0 17-11.5 28.5T340-800h-20v60h120q17 0 28.5 11.5T480-700q0 17-11.5 28.5T440-660v300q0 33-23.5 56.5T360-280h-40v220ZM200-360h160v-60h-70q-12 0-21-9t-9-21q0-12 9-21t21-9h70v-60h-70q-12 0-21-9t-9-21q0-12 9-21t21-9h70v-60H200v300ZM600-80q-33 0-56.5-23.5T520-160v-260q0-29 10-48t21-33q11-14 20-22.5t9-16.5v-20q-17 0-28.5-11.5T540-600q0-17 11.5-28.5T580-640h200q17 0 28.5 11.5T820-600q0 17-11.5 28.5T780-560v20q0 8 10 18t22 24q11 14 19.5 33t8.5 45v260q0 33-23.5 56.5T760-80H600Zm0-320h160v-20q0-15-9-26t-20-24q-11-13-21-29t-10-41v-20h-40v20q0 24-9.5 40T630-471q-11 13-20.5 24.5T600-420v20Zm0 120h160v-60H600v60Zm0 120h160v-60H600v60Zm0-120h160-160Z" />
                                </svg>
                            </div>

                            @if ($rs->vaccine_id == 1)
                                <a
                                    class="col-span-2 bg-green-500 py-1 px-2 rounded-lg text-sm text-center cursor-default">Adepto
                                    à vacinação</a>
                            @else
                                <a
                                    class="col-span-2 bg-red-500 py-1 px-2 rounded-lg text-sm text-center cursor-default">Inapto
                                    à vacinação</a>
                            @endif
                            <div class="row-span-2 col-span-1"></div>
                            @if ($rs->vaccine_id == 1)
                                @if ($rs->birth_date >= date('Y-m-d', strtotime('-9 years')))
                                    <a
                                        class="col-span-1 bg-blue-500 py-1 px-2 rounded-lg text-sm text-center cursor-default">2
                                        Doses</a>
                                @else
                                    <a
                                        class="col-span-1 bg-blue-500 py-1 px-2 rounded-lg text-sm text-center cursor-default">1
                                        Dose</a>
                                @endif
                            @else
                                <a></a>
                            @endif
                        </div>
                        <h5
                            class="block mb-5 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900 cursor-default">
                            {{ $rs->name }} {{ $rs->last_name }}
                        </h5>
                        <p
                            class="block font-sans text-base antialiased font-light leading-relaxed text-inherit cursor-default">
                            CPF: {{ $rs->cpf }}
                        </p>
                        <p
                            class="block font-sans text-base antialiased font-light leading-relaxed text-inherit cursor-default">
                            Data de Nascimento: {{ \Carbon\Carbon::parse($rs->birth_date)->format('d/m/Y') }}
                        </p>
                        <p
                            class="block font-sans text-base antialiased font-light leading-relaxed text-inherit cursor-default">
                            Telefone: {{ $rs->phone }}
                        </p>

                    </div>

                    @if ($access >= \Carbon\Carbon::now()->subDays(7))
                        @if (Auth::user()->vaccin_confirm == 0)
                            <div class="p-6 pt-0">
                                <a data-modal-target="editD-modal?id={{ $rs->id }}"
                                    data-modal-toggle="editD-modal?id={{ $rs->id }}"
                                    class="cursor-pointer relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-800 dark:text-white rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
                                    <span
                                        class="cursor-pointer relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-800 rounded-md group-hover:bg-opacity-0">
                                        <div class="inline-flex items-center align-middle">

                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-4 h-4 me-2">
                                                <path
                                                    d="M5.25 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM2.25 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM18.75 7.5a.75.75 0 0 0-1.5 0v2.25H15a.75.75 0 0 0 0 1.5h2.25v2.25a.75.75 0 0 0 1.5 0v-2.25H21a.75.75 0 0 0 0-1.5h-2.25V7.5Z" />
                                            </svg>

                                            {{ __('Editar Dependente') }}
                                        </div>
                                    </span>
                                </a>
                            </div>
                        @endif
                    @endif
                </div>
            @endforeach

        @endif

    </div>

    <!-- Register modal -->
    <div id="registerD-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Cadastrar novo dependente
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="registerD-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Fechar</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" method="POST" action="{{ route('dashboard.store') }}">
                    @csrf

                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <!-- Nome -->
                        <div class="col-span-1">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="">
                        </div>
                        <!-- Sobrenome id last_name -->
                        <div class="col-span-1">
                            <label for="last_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sobrenome</label>
                            <input type="text" name="last_name" id="last_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="">
                        </div>
                        <!-- CPF id cpf -->
                        <div class="col-span-2">
                            <label for="cpf"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CPF</label>
                            <input type="text" name="cpf" id="cpf"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="">
                        </div>
                        <!-- Data de nascimento id birth_date -->
                        <div class="col-span-2">
                            <label for="birth_date"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data de
                                nascimento</label>
                            <input type="date" name="birth_date" id="birth_date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="">
                        </div>
                        <!-- Telefone id phone -->
                        <div class="col-span-2">
                            <label for="phone"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefone</label>
                            <input type="text" name="phone" id="phone"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="">
                        </div>

                        <!-- Vacina id vaccine_id -->
                        <label for="vaccine_id" class="block text-sm font-medium text-gray-900 dark:text-white">
                            <p class="text-sm text-red-500">*Obrigatório </p>Selecione abaixo:
                        </label>

                        <ul class="space-y-4 mb-4 col-span-2">
                            <li>
                                <input type="radio" id="1" name="vaccine_id" value="1"
                                    class="hidden peer" required>
                                <label for="1"
                                    class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500 dark:peer-checked:text-green-500 peer-checked:border-green-600 peer-checked:text-green-600 hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">Adepto à vacinação</div>
                                    </div>
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="2" name="vaccine_id" value="2"
                                    class="hidden peer">
                                <label for="2"
                                    class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500 dark:peer-checked:text-red-500 peer-checked:border-red-600 peer-checked:text-red-600 hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">Inapto à vacinação</div>
                                    </div>
                                </label>
                            </li>
                        </ul>

                    </div>
                    <x-primary-button>
                        {{ __('Incluir dependente') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit D modal -->
    @if ($dependent->count() > 0)
        @foreach ($dependent as $rs)
            <div id="editD-modal?id={{ $rs->id }}" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Editar dependente
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="editD-modal?id={{ $rs->id }}">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Fechar</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form class="p-4 md:p-5" method="POST"
                            action="{{ route('dashboard.update', ['dependent' => $rs->id]) }}">
                            @csrf
                            @method('PUT')

                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <!-- Nome -->
                                <div class="col-span-1">
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome</label>
                                    <input type="text" name="name" value="{{ $rs->name }}" id="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        required="">
                                </div>
                                <!-- Sobrenome id last_name -->
                                <div class="col-span-1">
                                    <label for="last_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sobrenome</label>
                                    <input type="text" name="last_name" value="{{ $rs->last_name }}"
                                        id="last_name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        required="">
                                </div>
                                <!-- CPF id cpf -->
                                <div class="col-span-2">
                                    <label for="cpf"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CPF</label>
                                    <input type="text" name="cpf" value="{{ $rs->cpf }}" id="cpf"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        required="">
                                </div>
                                <!-- Data de nascimento id birth_date -->
                                <div class="col-span-2">
                                    <label for="birth_date"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data de
                                        nascimento</label>
                                    <input type="date" name="birth_date" value="{{ $rs->birth_date }}"
                                        id="birth_date"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        required="">
                                </div>
                                <!-- Telefone id phone -->
                                <div class="col-span-2">
                                    <label for="phone"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefone</label>
                                    <input type="text" name="phone" value="{{ $rs->phone }}" id="phone"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        required="">
                                </div>

                                <!-- Vacina id vaccine_id -->
                                <label for="phone"
                                    class="block text-sm font-medium text-gray-900 dark:text-white">Selecione
                                    abaixo:</label>

                                <ul class="space-y-4 mb-4 col-span-2">
                                    <li>
                                        <input type="radio" id="vaccine_id?id=1{{ $rs->id }}"
                                            name="vaccine_id" value="1" class="hidden peer"
                                            @if ($rs->vaccine_id == 1) checked @endif required>
                                        <label for="vaccine_id?id=1{{ $rs->id }}"
                                            class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500 dark:peer-checked:text-green-500 peer-checked:border-green-600 peer-checked:text-green-600 hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">Adepto à vacinação</div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="radio" id="vaccine_id?id=2{{ $rs->id }}"
                                            name="vaccine_id" value="2" class="hidden peer"
                                            @if ($rs->vaccine_id == 2) checked @endif>
                                        <label for="vaccine_id?id=2{{ $rs->id }}"
                                            class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500 dark:peer-checked:text-red-500 peer-checked:border-red-600 peer-checked:text-red-600 hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">Inapto à vacinação</div>
                                            </div>
                                        </label>
                                    </li>
                                </ul>

                            </div>
                            <x-primary-button>
                                {{ __('Editar dependente') }}
                            </x-primary-button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

    <!-- Delete D modal -->
    @if ($dependent->count() > 0)
        @foreach ($dependent as $rs)
            <div id="deleteD-modal?id={{ $rs->id }}" tabindex="-1"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="popup-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want
                                to delete this product?</h3>
                            <button data-modal-hide="popup-modal" type="button"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                Yes, I'm sure
                            </button>
                            <button data-modal-hide="popup-modal" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif



    <!-- Modal Aviso-->
    <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Atenção!
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        {{ __('A vacina aplicada será descontada em folha de pagamento.') }}
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button onclick="document.getElementById('static-modal').classList.add('hidden')" type="button"
                        class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:green-blue-800">Compreendo</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (!localStorage.getItem('modalShown')) {
                document.getElementById('static-modal').classList.remove('hidden');
                //adiciona a centralizacao do modal
                document.getElementById('static-modal').classList.add('flex');
                //adiciona o efeito de fundo escuro
                document.getElementById('static-modal').classList.add('bg-gray-900');
                //adiciona o efeito de opacidade
                document.getElementById('static-modal').classList.add('bg-opacity-70');
                localStorage.setItem('modalShown', true);
            }
        });
    </script>
</x-app-layout>
