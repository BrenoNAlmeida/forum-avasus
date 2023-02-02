<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img alt="logo" src={{asset("img/avasus.svg")}}>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register-aluno') }}">
            @csrf

            <!-- nome -->
            <div>
                <x-label for="nome" :value="__('nome')" />

                <x-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome')" required autofocus />
            </div>

            <!-- Nome social -->
            <div class="mt-4">
                <x-label for="nome_social" :value="__('nome social')" />

                <x-input id="nome_social" class="block mt-1 w-full" type="text" name="nome_social" :value="old('nome_social')"/>
            </div>

            <!-- cpf-->
            <div class="mt-4">
                <x-label for="cpf" :value="__('cpf')" />

                <x-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf')" required />
            </div>
            <!-- Data de nascimento -->
            <div class="mt-4">
                <x-label for="data_nascimento" :value="__('data nascimento')" />

                <x-input id="data_nascimento" class="block mt-1 w-full" type="date" name="data_nascimento" :value="old('data_nascimento')" required />
            </div>

            <!-- estado -->
            <div class="mt-4">
                <x-label for="estado" :value="__('estado')" />

                <x-input id="estado" class="block mt-1 w-full" type="text" name="estado" :value="old('estado')" required />
            </div>

            <!-- cidade -->
            <div class="mt-4">
                <x-label for="cidade" :value="__('cidade')" />

                <x-input id="cidade" class="block mt-1 w-full" type="text" name="cidade" :value="old('cidade')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                    @include('sweetalert::alert')
                    
                <x-button class="ml-4">
                    {{ __('finalizar cadastro') }}
                </x-button>
            </div>
        </form>
        
    </x-auth-card>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
</x-guest-layout>
