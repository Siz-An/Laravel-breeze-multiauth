<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- jQuery (required by DataTables) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <x-navbar/>
    <div class="flex min-h-screen bg-gray-100 dark:bg-gray-50 ">
        <div>
            <!-- Sidebar -->
            <x-sidebar />

    </div>

        <!-- Main Content -->
        <div x-data="{ sidebarCollapsed: false }" :class="sidebarCollapsed ? 'ml-20' : ''" class="flex-1 transition-all duration-300">
            <div class="pt-9 pb-8 px-4 sm:px-6 lg:px-8">
                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white dark:bg-gray-100 shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                    {{-- @yield('content') --}}
                </main>
            </div>
        </div>
    </div>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>

<script>
    $(document).ready(function() {
        $('#categoryTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "lengthMenu": [5, 10, 25, 50, 100],
        });
    });
</script>