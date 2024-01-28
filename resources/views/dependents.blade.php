<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-between ml-1 mr-2 items-center">
                {{ __('VittaSync - Dependentes') }} 

            <a data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="cursor-pointer relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-800 dark:text-white rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
                <span class="cursor-pointer relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-800 rounded-md group-hover:bg-opacity-0">
                    <div class="inline-flex items-center align-middle">

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 me-2">
                        <path d="M5.25 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM2.25 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM18.75 7.5a.75.75 0 0 0-1.5 0v2.25H15a.75.75 0 0 0 0 1.5h2.25v2.25a.75.75 0 0 0 1.5 0v-2.25H21a.75.75 0 0 0 0-1.5h-2.25V7.5Z" />
                    </svg>          

                    {{ __('Novo Dependente') }} 
                    </div>
                </span>
            </a>
        </h2>
    </x-slot>

    <!-- Alert top -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-sm sm:rounded-lg bg-gradient-to-r from-rose-700 via-rose-500 to-rose-700 p-1">
            <div class="flex h-full w-full bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Atenção! A vacina aplicada será descontada em folha de pagamento.") }}
                </div>
            </div>
            </div>
        </div>
    </div>
       
    <!-- List of dependents --> 
    <div class="grid grid-cols-4 gap-4 max-w-7xl mx-auto sm:px-6 lg:px-8">


        @if($dependent->count() > 0)
        @foreach($dependent as $rs)
            
        <div class="relative flex flex-col text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 shadow-md bg-clip-border rounded-xl w-96">
            <div class="p-6">
                <div class="grid grid-rows-3 grid-flow-col gap-4">
                    <div class="w-20 h-20 row-span-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="currentColor">
                            <path d="M192 0c13.3 0 24 10.7 24 24V37.5c0 35.6 43.1 53.5 68.3 28.3l9.5-9.5c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-9.5 9.5C293 124.9 310.9 168 346.5 168H360c13.3 0 24 10.7 24 24s-10.7 24-24 24H346.5c-35.6 0-53.5 43.1-28.3 68.3l9.5 9.5c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-9.5-9.5C259.1 293 216 310.9 216 346.5V360c0 13.3-10.7 24-24 24s-24-10.7-24-24V346.5c0-35.6-43.1-53.5-68.3-28.3l-9.5 9.5c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l9.5-9.5C91 259.1 73.1 216 37.5 216H24c-13.3 0-24-10.7-24-24s10.7-24 24-24H37.5c35.6 0 53.5-43.1 28.3-68.3l-9.5-9.5c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l9.5 9.5C124.9 91 168 73.1 168 37.5V24c0-13.3 10.7-24 24-24zm48 224a16 16 0 1 0 0-32 16 16 0 1 0 0 32zm-48-64a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm320 80c0 33 39.9 49.5 63.2 26.2c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6C574.5 312.1 591 352 624 352c8.8 0 16 7.2 16 16s-7.2 16-16 16c-33 0-49.5 39.9-26.2 63.2c6.2 6.2 6.2 16.4 0 22.6s-16.4 6.2-22.6 0C551.9 446.5 512 463 512 496c0 8.8-7.2 16-16 16s-16-7.2-16-16c0-33-39.9-49.5-63.2-26.2c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6C417.5 423.9 401 384 368 384c-8.8 0-16-7.2-16-16s7.2-16 16-16c33 0 49.5-39.9 26.2-63.2c-6.2-6.2-6.2-16.4 0-22.6s16.4-6.2 22.6 0C440.1 289.5 480 273 480 240c0-8.8 7.2-16 16-16s16 7.2 16 16zm0 112a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/>
                        </svg>    
                    </div> 
                    
                    @if($rs->vaccine_id == 1)
                        <a class="col-span-2 bg-green-500 py-1 px-2 rounded-lg text-sm text-center cursor-default">Adepto à vacinação</a>
                    @else
                        <a class="col-span-2 bg-red-500 py-1 px-2 rounded-lg text-sm text-center cursor-default">Inapto à vacinação</a>
                    @endif
                        <div class="row-span-2 col-span-1"></div>
                    @if($rs->vaccine_id == 1)
                        @if($rs->birth_date >= date('Y-m-d', strtotime('-1 years')))
                            <a class="col-span-1 bg-blue-500 py-1 px-2 rounded-lg text-sm text-center cursor-default">{{ date('Y-m-d', strtotime('-1 years')) }} Dose</a>
                        @endif
                        <a class="col-span-1 bg-blue-500 py-1 px-2 rounded-lg text-sm text-center cursor-default">1 Dose</a>
                    @else
                        <a></a>
                    @endif
                </div>
              <h5 class="block mb-5 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900 cursor-default">
                {{ $rs->name }} {{ $rs->last_name }}
              </h5>
              <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit cursor-default">
                CPF: {{ $rs->cpf }}
              </p>
              <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit cursor-default">
                Data de Nascimento: {{ \Carbon\Carbon::parse($rs->birth_date)->format('d/m/Y') }}
              </p>
              <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit cursor-default">
                Telefone: {{ $rs->phone }}
              </p>
              
            </div>
            
            <div class="p-6 pt-0">
                <a class="cursor-pointer relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-800 dark:text-white rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
                    <span class="cursor-pointer relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-800 rounded-md group-hover:bg-opacity-0">
                        <div class="inline-flex items-center align-middle">
    
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 me-2">
                            <path d="M5.25 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM2.25 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM18.75 7.5a.75.75 0 0 0-1.5 0v2.25H15a.75.75 0 0 0 0 1.5h2.25v2.25a.75.75 0 0 0 1.5 0v-2.25H21a.75.75 0 0 0 0-1.5h-2.25V7.5Z" />
                        </svg>          
    
                        {{ __('Editar Dependente') }} 
                        </div>
                    </span>
                </a>
            </div>
        </div> 
         
        @endforeach
    @else
        
    @endif


       

        
        
    </div>


  
    <!-- Main modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Cadastrar novo dependente
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Fechar</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" method="POST" action="{{ route('dashboard') }}">
                    @csrf

                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <!-- Nome -->
                            <div class="col-span-1">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome</label>
                                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                            </div>
                        <!-- Sobrenome id last_name -->
                            <div class="col-span-1">
                                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sobrenome</label>
                                <input type="text" name="last_name" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                            </div>
                        <!-- CPF id cpf -->
                            <div class="col-span-2">
                                <label for="cpf" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CPF</label>
                                <input type="text" name="cpf" id="cpf" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                            </div>
                        <!-- Data de nascimento id birth_date -->
                            <div class="col-span-2">
                                <label for="birth_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data de nascimento</label>
                                <input type="date" name="birth_date" id="birth_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                            </div>
                        <!-- Telefone id phone -->
                            <div class="col-span-2">
                                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefone</label>
                                <input type="text" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                            </div>

                        <!-- Vacina id vaccine_id -->
                        <label for="phone" class="block text-sm font-medium text-gray-900 dark:text-white">Selecione abaixo:</label>

                            <ul class="space-y-4 mb-4 col-span-2">
                                <li>
                                    <input type="radio" id="1" name="vaccine_id" value="1" class="hidden peer" required>
                                    <label for="1" class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500 dark:peer-checked:text-green-500 peer-checked:border-green-600 peer-checked:text-green-600 hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">                           
                                        <div class="block">
                                            <div class="w-full text-lg font-semibold">Adepto à vacinação</div>
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <input type="radio" id="2" name="vaccine_id" value="2" class="hidden peer">
                                    <label for="2" class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500 dark:peer-checked:text-red-500 peer-checked:border-red-600 peer-checked:text-red-600 hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                        <div class="block">
                                            <div class="w-full text-lg font-semibold">Inapto à vacinação</div>
                                        </div>
                                    </label>
                                </li>
                                
                            </ul>
                        
                    </div>
                    <x-primary-button class="ms-4">
                        {{ __('Incluir dependente') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div> 
  
</x-app-layout>
