<div class="flex items-center w-full gap-8">
    {{-- Desktop Nav --}}
    <nav class="hidden md:flex items-center space-x-8 flex-1">
        <a href="{{ route('tasks.index') }}" class="text-gray-600 hover:text-blue-600 transition">Tasks</a>
        <a href="{{ route('projects.index') }}" class="text-gray-600 hover:text-blue-600 transition">Projects</a>
        <a href="{{ route('knowledge.index') }}" class="text-gray-600 hover:text-blue-600 transition">Knowledge</a>
    </nav>

    {{-- Authentication Links --}}
    <div class="hidden md:flex items-center space-x-4">
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

    {{-- Mobile Hamburger --}}
    <div class="md:hidden ml-auto" x-data="{ open: false }">
        <button @click="open = !open" class="text-gray-600 hover:text-blue-600 focus:outline-none">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
            </svg>
        </button>

        <div x-show="open" @click.away="open = false" class="absolute left-0 right-0 top-16 bg-white border-t shadow-md">
            <a href="{{ route('tasks.index') }}" class="block px-6 py-3 text-gray-700 hover:bg-gray-100">Tasks</a>
            <a href="{{ route('projects.index') }}" class="block px-6 py-3 text-gray-700 hover:bg-gray-100">Projects</a>
            <a href="{{ route('knowledge.index') }}" class="block px-6 py-3 text-gray-700 hover:bg-gray-100">Knowledge</a>

            @auth
                <a href="{{ route('profile.edit') }}" class="block px-6 py-3 text-gray-700 hover:bg-gray-100">Profile</a>
                <a href="{{ route('settings') }}" class="block px-6 py-3 text-gray-700 hover:bg-gray-100">Settings</a>
                <form method="POST" action="{{ route('logout') }}" class="block px-6 py-3">
                    @csrf
                    <button type="submit" class="text-gray-700 hover:bg-gray-100 w-full text-left">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block px-6 py-3 text-gray-700 hover:bg-gray-100">Login</a>
                <a href="{{ route('register') }}" class="block px-6 py-3 text-gray-700 hover:bg-gray-100">Register</a>
            @endauth
        </div>
    </div>
</div>
