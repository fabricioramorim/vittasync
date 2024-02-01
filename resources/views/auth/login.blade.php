<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="registration" :value="__('Matrícula')" />
            <x-text-input id="registration" class="block mt-1 w-full" type="text" name="registration" :value="old('registration')"
                required autofocus autocomplete="registration" />
            <x-input-error :messages="$errors->get('registration')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Lembre-me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3">
                {{ __('Entrar') }}
            </x-primary-button>
        </div>
    </form>


    <!-- Modal Aviso-->
    <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
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
                @if ($access->count() > 0)
                @foreach ($access as $rs)
                <div class="p-4 md:p-5 space-y-4">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Informamos que, a partir de {{ \Carbon\Carbon::parse($rs->date_access)->format('d/m/Y') }}, suas permissões de acesso ao sistema serão alteradas. Você terá apenas acesso para visualizar os dados, mas não poderá mais editar ou criar novos registros.
                    </p>
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Essa alteração é necessária para garantir a segurança dos dados e a conformidade com as políticas internas da empresa.
                    </p>
                </div>
                @endforeach
                @endif
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
            document.getElementById('static-modal').classList.remove('hidden');
            //adiciona a centralizacao do modal
            document.getElementById('static-modal').classList.add('flex');
            //adiciona o efeito de fundo escuro
            document.getElementById('static-modal').classList.add('bg-gray-900');
            //adiciona o efeito de opacidade
            document.getElementById('static-modal').classList.add('bg-opacity-50');
            
            localStorage.setItem('modalShown', true);
        });
    </script>

</x-guest-layout>
