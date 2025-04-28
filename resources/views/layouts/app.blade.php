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
        <div class="container mx-auto flex items-center justify-between px-4 py-4">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600 hover:text-blue-800 transition">
                {{ config('app.name', 'NexusMind') }}
            </a>

            <nav class="hidden md:flex space-x-8">
                <a href="{{ route('tasks.index') }}" class="text-gray-600 hover:text-blue-600 transition">Tasks</a>
                <a href="{{ route('projects.index') }}" class="text-gray-600 hover:text-blue-600 transition">Projects</a>
                <a href="{{ route('knowledge.index') }}" class="text-gray-600 hover:text-blue-600 transition">Knowledge</a>
            </nav>

            <div class="flex items-center space-x-4">
                @auth
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition">
                            <span>{{ Auth::user()->name }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.23 7.21a1 1 0 011.42 0L10 10.59l3.36-3.38a1 1 0 111.42 1.42l-4.07 4.08a1 1 0 01-1.42 0L5.23 8.63a1 1 0 010-1.42z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-md py-2 z-50">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                            <a href="{{ route('settings') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 transition">Login</a>
                    <a href="{{ route('register') }}" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">Register</a>
                @endauth
            </div>

            <div class="md:hidden" x-data="{ open: false }">
                <button @click="open = !open" class="text-gray-600 hover:text-blue-600 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
                    </svg>
                </button>

                <div x-show="open" @click.away="open = false" class="absolute left-0 right-0 top-16 bg-white border-t shadow-md">
                    <a href="{{ route('tasks.index') }}" class="block px-6 py-3 text-gray-700 hover:bg-gray-100">Tasks</a>
                    <a href="{{ route('projects.index') }}" class="block px-6 py-3 text-gray-700 hover:bg-gray-100">Projects</a>
                    <a href="{{ route('knowledge.index') }}" class="block px-6 py-3 text-gray-700 hover:bg-gray-100">Knowledge</a>
                </div>
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

    <footer class="bg-gray-900 text-gray-400 py-8">
        <div class="container mx-auto px-4 flex flex-col md:flex-row justify-between">
            <div class="mb-6 md:mb-0">
                <h3 class="text-xl font-bold text-white mb-2">{{ config('app.name', 'NexusMind') }}</h3>
                <p class="text-sm">Integrated task, project and knowledge management system</p>
            </div>

            <div class="grid grid-cols-2 gap-8 text-sm">
                <div>
                    <h4 class="text-gray-300 font-semibold mb-3">Features</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:underline">Task Manager</a></li>
                        <li><a href="#" class="hover:underline">Project Manager</a></li>
                        <li><a href="#" class="hover:underline">Second Brain</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-gray-300 font-semibold mb-3">Support</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:underline">Documentation</a></li>
                        <li><a href="#" class="hover:underline">API</a></li>
                        <li><a href="#" class="hover:underline">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="mt-8 text-center text-xs text-gray-500">
            &copy; {{ date('Y') }} {{ config('app.name', 'NexusMind') }}. All rights reserved.
        </div>
    </footer>

    @stack('scripts')
    @livewireScripts

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</body>
</html>
