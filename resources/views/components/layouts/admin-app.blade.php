<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/layout/logo.png') }}">

    <title>{{ $title ?? 'Admin' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-gray-900">
    <div class="min-h-screen flex overflow-hidden">
        <div class="flex-1 flex flex-col overflow-hidden">
            <main class="flex-1 flex overflow-hidden">
                <div class="flex flex-1 overflow-hidden">
                    <!-- Navigation -->
                    @livewire('components.admin.navbar')

                    <!-- Main Content -->
                    <div class="flex-1 p-4 pt-12">
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    @livewireScripts
</body>

</html>
