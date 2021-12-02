<x-guest-layout>
    <x-auth.auth-card>
        <x-slot name="logo">
           <h4 class="text-center font-display font-bold text-lg uppercase tracking-wider text-gray-700 dark:text-gray-300">
              {{ config('setting.app_name.value')?? config('app.name')}}
           </h4>
        </x-slot>

        <!-- Session Status -->
        <x-auth.auth-session-status class="mb-4" :status="session('status')"></x-auth.auth-session-status>

        <!-- Validation Errors -->
        <x-auth.auth-validation-errors class="mb-4" :errors="$errors"></x-auth.auth-validation-errors>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-auth.label for="username" :value="__('Username')"></x-auth.label>

                <x-auth.input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus></x-auth.input>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-auth.label for="password" :value="__('Password')"></x-auth.label>

                <x-auth.input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password"></x-auth.input>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-300">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-auth.button class="ml-3">
                    {{ __('Log in') }}
                </x-auth.button>
            </div>
        </form>
    </x-auth.auth-card>
</x-guest-layout>
