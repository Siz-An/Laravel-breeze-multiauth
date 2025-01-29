<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="font-sans antialiased dark:bg-black dark:text-gray-300">
    <div class="bg-gray-50 text-gray-700 dark:bg-black dark:text-gray-300 relative min-h-screen flex flex-col">
        <!-- Background Image -->
        <img id="background" class="absolute left-0 top-0 w-full max-w-2xl object-cover opacity-20" src="https://laravel.com/assets/img/welcome/background.svg" alt="Laravel background" />

        <div class="relative flex flex-col items-center justify-center min-h-screen">
            <div class="w-full max-w-3xl px-6 lg:max-w-5xl">
                <!-- Header -->
                <header class="flex items-center justify-between py-6">
                    <!-- Placeholder for Logo (if needed) -->
                    <div></div>

                    @if (Route::has('login'))
                        <nav class="flex gap-4">
                            @auth('web')
                                <a href="{{ url('/dashboard') }}" class="rounded-md px-4 py-2 bg-gray-200 text-black hover:bg-gray-300 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="rounded-md px-4 py-2 border border-gray-300 text-black hover:bg-gray-200 dark:border-gray-600 dark:text-white dark:hover:bg-gray-800">
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="rounded-md px-4 py-2 border border-gray-300 text-black hover:bg-gray-200 dark:border-gray-600 dark:text-white dark:hover:bg-gray-800">
                                        Register
                                    </a>
                                @endif
                            @endauth

                            @auth('admin')
                                <a href="{{ url('/admin/dashboard') }}" class="rounded-md px-4 py-2 bg-red-500 text-white hover:bg-red-600">
                                    Admin Dashboard
                                </a>
                            @else
                                <a href="{{ route('admin.login') }}" class="rounded-md px-4 py-2 border border-gray-300 text-black hover:bg-gray-200 dark:border-gray-600 dark:text-white dark:hover:bg-gray-800">
                                    Admin Log in
                                </a>

                                @if (Route::has('admin.register'))
                                    <a href="{{ route('admin.register') }}" class="rounded-md px-4 py-2 border border-gray-300 text-black hover:bg-gray-200 dark:border-gray-600 dark:text-white dark:hover:bg-gray-800">
                                        Admin Register
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </header>

                <!-- Main Content -->
                <main class="mt-6 text-center">
                    <h1 class="text-3xl font-semibold text-gray-800 dark:text-white">
                        Welcome to Laravel
                    </h1>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">
                        Build amazing web applications with ease.
                    </p>
                </main>
            </div>
        </div>
    </div>
</body>
</html>
