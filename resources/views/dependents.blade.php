<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-between ml-1 mr-2 items-center">
                {{ __('VittaSync - Dependentes') }} 

            <a class="cursor-pointer relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-800 dark:text-white rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
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

        <div class="relative flex flex-col text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 shadow-md bg-clip-border rounded-xl w-96">
            <div class="p-6">
                <div class="grid grid-rows-3 grid-flow-col gap-4">
                    <div class="w-20 h-20 row-span-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="currentColor">
                            <path d="M192 0c13.3 0 24 10.7 24 24V37.5c0 35.6 43.1 53.5 68.3 28.3l9.5-9.5c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-9.5 9.5C293 124.9 310.9 168 346.5 168H360c13.3 0 24 10.7 24 24s-10.7 24-24 24H346.5c-35.6 0-53.5 43.1-28.3 68.3l9.5 9.5c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-9.5-9.5C259.1 293 216 310.9 216 346.5V360c0 13.3-10.7 24-24 24s-24-10.7-24-24V346.5c0-35.6-43.1-53.5-68.3-28.3l-9.5 9.5c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l9.5-9.5C91 259.1 73.1 216 37.5 216H24c-13.3 0-24-10.7-24-24s10.7-24 24-24H37.5c35.6 0 53.5-43.1 28.3-68.3l-9.5-9.5c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l9.5 9.5C124.9 91 168 73.1 168 37.5V24c0-13.3 10.7-24 24-24zm48 224a16 16 0 1 0 0-32 16 16 0 1 0 0 32zm-48-64a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm320 80c0 33 39.9 49.5 63.2 26.2c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6C574.5 312.1 591 352 624 352c8.8 0 16 7.2 16 16s-7.2 16-16 16c-33 0-49.5 39.9-26.2 63.2c6.2 6.2 6.2 16.4 0 22.6s-16.4 6.2-22.6 0C551.9 446.5 512 463 512 496c0 8.8-7.2 16-16 16s-16-7.2-16-16c0-33-39.9-49.5-63.2-26.2c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6C417.5 423.9 401 384 368 384c-8.8 0-16-7.2-16-16s7.2-16 16-16c33 0 49.5-39.9 26.2-63.2c-6.2-6.2-6.2-16.4 0-22.6s16.4-6.2 22.6 0C440.1 289.5 480 273 480 240c0-8.8 7.2-16 16-16s16 7.2 16 16zm0 112a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/>
                        </svg>    
                    </div> 
    
                    <a class="col-span-2 bg-green-500 py-1 px-2 rounded-lg text-sm text-center cursor-default">Adepto a vacinação</a>
                    
                    <div class="row-span-2 col-span-1"></div>

                    <a class="col-span-1 bg-blue-500 py-1 px-2 rounded-lg text-sm text-center cursor-default">1 Dose</a>
                </div>
              <h5 class="block mb-5 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900 cursor-default">
                Fabricio Roney de Amorim
              </h5>
              <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit cursor-default">
                CPF: 000.000.000-00
              </p>
              <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit cursor-default">
                Data de Nascimento: 00/00/0000
              </p>
              <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit cursor-default">
                Telefone: (00) 00000-0000
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
        
    </div>

    

<!-- Modal toggle -->
<button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
    Toggle modal
  </button>
  
  <!-- Main modal -->
  <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-md max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                      Create New Product
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <form class="p-4 md:p-5">
                  <div class="grid gap-4 mb-4 grid-cols-2">
                      <div class="col-span-2">
                          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                          <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                      </div>
                      <div class="col-span-2 sm:col-span-1">
                          <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                          <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
                      </div>
                      <div class="col-span-2 sm:col-span-1">
                          <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                          <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                              <option selected="">Select category</option>
                              <option value="TV">TV/Monitors</option>
                              <option value="PC">PC</option>
                              <option value="GA">Gaming/Console</option>
                              <option value="PH">Phones</option>
                          </select>
                      </div>
                      <div class="col-span-2">
                          <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
                          <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write product description here"></textarea>                    
                      </div>
                  </div>
                  <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                      <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                      Add new product
                  </button>
              </form>
          </div>
      </div>
  </div> 
  
</x-app-layout>
