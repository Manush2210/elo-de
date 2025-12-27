<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('logo.png') }}">

    <!-- Open Graph / Social Media Meta Tags -->
    <meta property="og:site_name" content="Sani Sterne Vohersagen">
    <meta property="og:title" content="{{ $title ?? 'Sani Sterne Vohersagen' }}">
    <meta property="og:description"
        content="{{ $description ?? 'Sani Sterne Vohersagen - Online-Wahrsagungsdienste und Lithotherapie' }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ $ogImage ?? asset('logo.png') }}">

    <title>{{ $title ?? 'Sani Sterne Vohersagen' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles()
</head>

<body>
    @livewire('layout.navbar')
    {{ $slot }}
    @livewire('components.layout.footer')
    @livewire('components.product.cart-updated')
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    @stack('scripts')
</body>

</html>
