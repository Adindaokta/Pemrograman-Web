<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Triplay Healing') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50">

    <header class="fixed w-full top-0 z-50 bg-black bg-opacity-80 backdrop-blur-md text-white shadow-lg">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="text-2xl font-bold tracking-wide">Triplay Healing</a>

            {{-- Desktop Navigation --}}
            <nav class="hidden md:flex space-x-6">
                <a href="{{ route('home') }}" class="hover:text-indigo-400 transition">Home</a>
                <a href="{{ route('activities') }}" class="hover:text-indigo-400 transition">Kegiatan</a>
                
                @auth
                    {{-- Cek apakah user adalah admin (sesuaikan logika role Anda) --}}
                    {{-- Jika Anda menggunakan kolom 'role' di tabel users --}}
                    @if(Auth::user()->role === 'superadmin' || Auth::user()->role === 'admin')
                        {{-- PERBAIKAN DI SINI: Menggunakan route 'admin.users' --}}
                        <a href="{{ route('admin.users') }}" class="text-red-400 hover:text-red-300 font-bold">Kelola User</a>
                        <a href="{{ route('admin.destinations') }}" class="text-green-400 hover:text-green-300 font-bold">Kelola Destinasi</a>
                    @endif
                @endauth
            </nav>

            {{-- Right Side (Login/Profile) --}}
            <div class="hidden md:flex items-center space-x-4 relative">
                
                @guest
                    <a href="{{ route('login') }}" class="hover:text-indigo-400 font-medium">Login</a>
                    <a href="{{ route('register') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-full transition font-medium">Register</a>
                @else
                    {{-- Dropdown User --}}
                    <div x-data="{ open: false }" @click.away="open = false" class="relative">
                        <button @click="open = ! open" class="flex items-center space-x-2 focus:outline-none hover:text-indigo-300 transition">
                            <span class="font-semibold">{{ Auth::user()->name }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="open"
                             x-transition
                             class="absolute right-0 mt-2 w-48 bg-gray-800 text-white rounded-md shadow-lg border border-gray-700 z-50"
                             style="display: none;">
                            
                            {{-- Link Profile --}}
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-700 rounded-t-md transition">
                                Ubah Profil
                            </a>

                            {{-- Link Dashboard (Bisa diarahkan ke admin dashboard jika admin) --}}
                            @if(Auth::user()->role === 'superadmin' || Auth::user()->role === 'admin')
                                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 hover:bg-gray-700 transition">
                                    Dashboard Admin
                                </a>
                            @else
                                <a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-gray-700 transition">
                                    Dashboard
                                </a>
                            @endif
                            
                            {{-- Logout --}}
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 hover:bg-red-600 rounded-b-md transition">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @endguest

            </div>

            {{-- Mobile Menu Button --}}
            <button id="menu-toggle" class="md:hidden focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        {{-- Mobile Menu --}}
        <div id="mobile-menu" class="hidden md:hidden bg-gray-900 border-t border-gray-700">
            <nav class="flex flex-col space-y-3 px-6 py-4">
                <a href="{{ route('home') }}" class="hover:text-indigo-400">Home</a>
                <a href="{{ route('activities') }}" class="hover:text-indigo-400">Kegiatan</a>

                @auth
                    <a href="{{ route('profile.edit') }}" class="hover:text-indigo-400">Profil</a>
                    
                    @if(Auth::user()->role === 'superadmin' || Auth::user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="text-green-400 font-bold">Admin Dashboard</a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="hover:text-red-400 text-left w-full">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:text-indigo-400">Login</a>
                    <a href="{{ route('register') }}" class="hover:text-indigo-400">Register</a>
                @endauth
            </nav>
        </div>
    </header>

    {{-- Main Content --}}
    <div class="min-h-screen pt-24 pb-10 flex flex-col justify-between">
        <main class="container mx-auto px-4 sm:px-6 lg:px-8">
            @isset($header)
                <div class="mb-6 pb-4 border-b border-gray-200">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ $header }}
                    </h2>
                </div>
            @endisset

            {{-- Slot untuk konten halaman --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                {{ $slot ?? '' }}
                @yield('content')
            </div>
        </main>
    </div>

    {{-- Footer --}}
    <footer class="bg-gray-900 text-white text-center py-6 mt-auto">
        <p>&copy; {{ date('Y') }} Triplay Healing. All rights reserved.</p>
    </footer>

    {{-- Script untuk Mobile Menu --}}
    <script>
        const toggle = document.getElementById('menu-toggle');
        const menu = document.getElementById('mobile-menu');
        
        if(toggle && menu) {
            toggle.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });
        }
    </script>
</body>
</html>