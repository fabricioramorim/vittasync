<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Register -->
        <div class="mt-4">
            <x-input-label for="registration" :value="__('Matrícula')" />
            <x-text-input id="registration" class="block mt-1 w-full" type="text" name="registration" :value="old('registration')" required autocomplete="registration" />
            <x-input-error :messages="$errors->get('registration')" class="mt-2" />
        </div>

        <!-- Telefone id phone -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Telefone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Select Administrador id is_admin -->
        <div class="mt-4">
            <x-input-label for="is_admin" :value="__('Administrador')" />
            <select name="is_admin" id="is_admin" class="block mt-1 w-full">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
            <x-input-error :messages="$errors->get('is_admin')" class="mt-2" />
        </div>

        <!-- Select Usuario Bloqueado id is_active -->
        <div class="mt-4">
            <x-input-label for="is_active" :value="__('Bloqueado')" />
            <select name="is_active" id="is_active" class="block mt-1 w-full">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
            <x-input-error :messages="$errors->get('is_active')" class="mt-2" />
        </div>

        <!-- Select Unidade id unit_id -->
        <div class="mt-4">
            <x-input-label for="unit_id" :value="__('Unidade')" />
            <select name="unit_id" id="unit_id" class="block mt-1 w-full">
                @if($unit->count() > 0)
                    @foreach($unit as $rs)
                        <option value="{{ $rs->id }}">{{ $rs->name }}</option>
                    @endforeach
                @else
                    <option value="0">Unidades não encontradas</option>
                @endif
            </select>
            <x-input-error :messages="$errors->get('unit_id')" class="mt-2" />

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
