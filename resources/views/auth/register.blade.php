<x-guest-layout>
    <x-auth-card>
        <h2>Créer un compte</h2>
        <form method="POST" action="{{ route('register') }}" class="form-login">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Identifiant')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="identifiant" :value="old('identifiant')" required autofocus />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Déjà enregistré?') }}
                </a>
                <a href="{{ route('dashboard.index') }}" class="d-block mt-3 mb-3"> Retour au tableau de bord</a>

                <x-primary-button class="ml-4 btn btn-primary">
                    {{ __('S\'enregistrer') }}
                </x-primary-button>
            </div>
        </form>
        
    </x-auth-card>
</x-guest-layout>