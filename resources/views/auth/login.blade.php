<x-guest-layout>


    {{-- <div class="card" style="width: 500px; margin: 100px auto">
        <div class="card-header">
            Login
            @if (session('message'))
                <div class="alert alert-danger">{{ session('message') }}</div>
            @endif
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('submit-login') }}">
                @csrf
                <table class="table">
                    <tr>
                        <td>Email: </td>
                        <td>
                            <input type="email" class="form-control" name="email">
                        </td>
                    </tr>
                    <tr>
                        <td>Password </td>
                        <td>
                            <input type="password" class="form-control" name="password"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input class="btn btn-primary" type="submit" name="add" value="Login"/> </td>
                    </tr>
                </table>
            </form>
        </div>
    </div> --}}

    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        @if (session('message'))
           <div class="alert alert-danger">{{ session('message') }}</div>
        @endif

        <form method="POST"  action="{{ route('submit-login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
