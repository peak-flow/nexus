<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'NexusMind') }} - @yield('title', 'Home')</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Tailwind 4 CDN - You'll need to replace this with the actual CDN when Tailwind 4 is officially released -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Configure Tailwind -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                            950: '#082f49',
                        },
                        secondary: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            300: '#cbd5e1',
                            400: '#94a3b8',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a',
                            950: '#020617',
                        },
                    }
                }
            }
        }
    </script>

    @stack('styles')
</head>
<body class="font-sans antialiased bg-gray-100 min-h-screen flex flex-col">
    <header class="bg-primary-700 text-white shadow">
        <div class="container mx-auto py-4 px-6 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold">
                {{ config('app.name', 'NexusMind') }}
            </a>

            <nav class="hidden md:flex space-x-6">
                <a href="{{ route('tasks.index') }}" class="hover:text-primary-200 transition">Tasks</a>
                <a href="{{ route('projects.index') }}" class="hover:text-primary-200 transition">Projects</a>
                <a href="{{ route('knowledge.index') }}" class="hover:text-primary-200 transition">Knowledge</a>
            </nav>

            <div class="flex items-center space-x-4">
                @auth
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2">
                            <span>{{ Auth::user()->name }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                            <a href="{{ route('settings') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="hover:text-primary-200 transition">Login</a>
                    <a href="{{ route('register') }}" class="bg-white text-primary-700 py-2 px-4 rounded hover:bg-primary-50 transition">Register</a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <button class="md:hidden flex items-center" x-data="{ open: false }" @click="open = !open">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>

                <!-- Mobile menu -->
                <div x-show="open" @click.away="open = false" class="absolute top-16 right-0 left-0 bg-primary-700 z-10">
                    <a href="{{ route('tasks.index') }}" class="block py-2 px-6 hover:bg-primary-600">Tasks</a>
                    <a href="{{ route('projects.index') }}" class="block py-2 px-6 hover:bg-primary-600">Projects</a>
                    <a href="{{ route('knowledge.index') }}" class="block py-2 px-6 hover:bg-primary-600">Knowledge</a>
                </div>
            </button>
        </div>
    </header>

    <main class="flex-grow container mx-auto py-6 px-4 sm:px-6 lg:px-8">
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                <p>{{ session('error') }}</p>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-primary-800 text-white py-6">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between">
                <div class="mb-6 md:mb-0">
                    <h3 class="text-xl font-bold mb-2">{{ config('app.name', 'NexusMind') }}</h3>
                    <p class="text-primary-200">Integrated task, project and knowledge management</p>
                </div>

                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <h4 class="font-semibold text-primary-100 mb-3">Features</h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-primary-300 hover:text-white transition">Task Manager</a></li>
                            <li><a href="#" class="text-primary-300 hover:text-white transition">Project Manager</a></li>
                            <li><a href="#" class="text-primary-300 hover:text-white transition">Second Brain</a></li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="font-semibold text-primary-100 mb-3">Support</h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-primary-300 hover:text-white transition">Documentation</a></li>
                            <li><a href="#" class="text-primary-300 hover:text-white transition">API</a></li>
                            <li><a href="#" class="text-primary-300 hover:text-white transition">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-primary-700 text-primary-300 text-sm">
                <p>&copy; {{ date('Y') }} {{ config('app.name', 'NexusMind') }}. All rights reserved.</p>
            </div>
        </div>
    </footer>

    @stack('scripts')

    <!-- Alpine.js - for mobile menu and dropdowns -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
