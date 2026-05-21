<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name')) - صحتي</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @stack('styles')
</head>
<body class="bg-gray-50 font-sans antialiased">
    <nav class="bg-white shadow-lg border-b" dir="ltr">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <a href="/" class="flex items-center space-x-2">
                    <span class="text-2xl">⚕️</span>
                    <span class="text-xl font-bold text-teal-600">صحتي</span>
                </a>
                @auth
                <div class="flex items-center space-x-4">
                    <a href="/dashboard" class="text-gray-700 hover:text-teal-600">{{ __('Dashboard') }}</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-700 hover:text-red-600">{{ __('Logout') }}</button>
                    </form>
                </div>
                @endauth
                @guest
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-teal-600">{{ __('Login') }}</a>
                    <a href="{{ route('register') }}" class="bg-teal-600 text-white px-4 py-2 rounded-lg hover:bg-teal-700">{{ __('Register') }}</a>
                </div>
                @endguest
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
    @stack('scripts')
</body>
</html>
