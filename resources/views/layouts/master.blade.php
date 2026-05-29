<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistem Data Pegawai</title>

    <!-- Vite (INI WAJIB BIAR TAILWIND NYALA) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-900 min-h-screen">

    <header class="bg-white shadow p-4">
        @if (Route::has('login'))
            <nav class="flex justify-end gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-blue-600 hover:underline">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600">
                        Login
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-gray-700 hover:text-blue-600">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <main class="p-6">
        @yield('content')
    </main>

</body>
</html>