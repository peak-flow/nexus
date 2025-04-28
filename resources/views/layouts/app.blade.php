<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'NexusMind') }} - @yield('title', 'Home')</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>

    @stack('styles')
    @livewireStyles

</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased min-h-screen flex flex-col">
<header class="bg-white shadow-sm">
    <div class="container mx-auto flex items-center justify-start gap-8 px-4 py-4">
        <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600 hover:text-blue-800 transition">
            {{ config('app.name', 'NexusMind') }}
        </a>
        <div class="flex-1">
            @include('layouts.navbar')
        </div>
    </div>
</header>

<main class="flex-grow container mx-auto px-4 py-8">
    @if (session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-md border border-green-200">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mb-6 p-4 bg-red-100 text-red-800 rounded-md border border-red-200">
            {{ session('error') }}
        </div>
    @endif

    @yield('content')
</main>

@include('layouts.footer')

@stack('scripts')
@livewireScripts

<!-- Alpine.js -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</body>
</html>
