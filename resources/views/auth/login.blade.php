<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIU Accounts Portal Login</title>
    <link rel="icon" href="{{ asset('Images/diu logo.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('login.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>

    <div class="navbar">
        <div class="nav-container">
            <img src="{{ asset('Images/logo_white.png') }}" alt="DIU Logo" class="logo">

            <ul class="nav-links">
                <li><a href="/">Home</a></li>
                <li><a href="#">Semester Fee Amount</a></li>
                <li><a href="#">Get Token</a></li>
                <li><a href="contact">Contact Us</a></li>
            </ul>
        </div>
    </div>

    <!-- LOGIN FORM (Laravel Breeze) -->
    <x-guest-layout>
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full"
                              type="email"
                              name="email"
                              :value="old('email')"
                              required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              required />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="remember"
                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                    <span class="ms-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                       href="{{ route('password.request') }}">
                        Forgot your password?
                    </a>
                @endif

                <x-primary-button class="ms-3">
                    Log in
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>

</body>
</html>
