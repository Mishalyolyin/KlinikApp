{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-white font-sans antialiased">
    <div class="min-h-screen flex">
        @auth
            @include('layouts.navigation') {{-- ini hanya sidebar, tanpa $slot --}}
        @endauth

        <main class="flex-1 overflow-y-auto py-6 px-4">
            {{ $slot }} {{-- slot dari layout --}}
        </main>
    </div>

    @livewireScripts
    @stack('scripts')
</body>
</html>
