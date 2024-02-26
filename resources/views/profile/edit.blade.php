<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Perfil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Dados do usuário') }}
                            </h2>
                        </header>
                    
                        <!--<form id="send-verification" method="post" action="{{ route('verification.send') }}">
                            @csrf
                        </form>-->
                    
                        <!--<form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')-->
                    
                            
                            <div>
                                <x-input-label for="registration" :value="__('Matrícula / Chapa')" />
                                <x-text-input id="registration" name="registration" type="text" class="mt-1 block w-full" disabled :value="old('registration', $user->registration)" required autofocus autocomplete="registration" />
                                <x-input-error class="mt-2" :messages="$errors->get('registration')" />
                            </div>
                    
                            <div>
                                <x-input-label for="name" :value="__('Nome')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" disabled autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                    
                            <div>
                                <x-input-label for="cpf" :value="__('CPF')" />
                                <x-text-input id="cpf" name="cpf" type="text" class="mt-1 block w-full" :value="old('cpf', $user->cpf)" disabled autofocus autocomplete="cpf" />
                                <x-input-error class="mt-2" :messages="$errors->get('cpf')" />
                            </div>
                    
                            <div>
                                <x-input-label for="birth_date" :value="__('Data de nascimento')" />
                                <x-text-input id="birth_date" name="birth_date" type="text" class="mt-1 block w-full" :value="old('birth_date', \Carbon\Carbon::parse($user->birth_date)->format('d/m/Y'))" disabled autofocus autocomplete="birth_date" />
                                <x-input-error class="mt-2" :messages="$errors->get('birth_date')" />
                            </div>
                    
                            <div>
                                <div>
                                    @php
                                    //consulta a tabela unit com o id do usuário
                                    $unit = App\Models\Unit::find($user->unit_id);
                                                
                                    @endphp
                                    <x-input-label for="unit_id" :value="__('Unidade')" />
                                    @if ($unit)
                                        <x-text-input id="unit_id" name="unit_id" type="text" class="mt-1 block w-full" :value="old('unit_id', $unit->name)" disabled autofocus autocomplete="unit_id" />
                                    @else
                                        <x-text-input id="unit_id" name="unit_id" type="text" class="mt-1 block w-full" disabled autofocus autocomplete="unit_id" />
                                    @endif
                                    <x-input-error class="mt-2" :messages="$errors->get('unit_id')" />

                                </div>
                            </div>
                    
                            <div class="flex items-center gap-4">
                                <!--<x-primary-button>{{ __('Salvar') }}</x-primary-button>-->
                    
                                @if (session('status') === 'profile-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600 dark:text-gray-400"
                                    >{{ __('Salvo.') }}</p>
                                @endif
                            </div>
                        <!--</form>-->
                    </section>
                    
                </div>
            </div>
           
        </div>
</x-app-layout>
