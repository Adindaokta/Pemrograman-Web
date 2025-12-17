<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Triplay Healing</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <header class="fixed w-full top-0 z-50 bg-black bg-opacity-50 backdrop-blur-md text-white shadow-lg">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <a href="{{ url('/') }}" class="text-2xl font-bold tracking-wide">Triplay Healing</a>

            <nav class="hidden md:flex space-x-6">
                <a href="#home" class="hover:text-indigo-400 transition">Home</a>
                <a href="activities" class="hover:text-indigo-400 transition">Kegiatan</a>
                <a href="#blog" class="hover:text-indigo-400 transition">Blog</a>
                <a href="#about" class="hover:text-indigo-400 transition">Tentang</a>
                <a href="#contact" class="hover:text-indigo-400 transition">Kontak</a>
            </nav>

         <div class="hidden md:flex items-center space-x-4 relative">
                @guest
                    <a href="{{ route('login') }}" class="hover:text-indigo-400">Login</a>
                    <a href="{{ route('register') }}" class="hover:text-indigo-400">Register</a>
                @else

                    <div x-data="{ open: false }" @click.away="open = false" class="relative">

                        <button @click="open = ! open" class="flex items-center space-x-2 focus:outline-none">
                            <span class="font-semibold">{{ Auth::user()->name }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="open"
                             x-transition
                             class="absolute right-0 mt-2 w-48 bg-gray-800 bg-opacity-90 text-white rounded-md shadow-lg"
                             style="display: none;" {{-- Ini untuk mencegah kedipan saat load --}}
                        >
                            <a href="{{ url('/profile') }}" class="block px-4 py-2 hover:bg-gray-700 rounded-t-md">
                                Ubah Profil
                            </a>
                            <a href="{{ url('/pesanan-saya') }}" class="block px-4 py-2 hover:bg-gray-700">
                                Lihat Pesanan
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-700 rounded-b-md">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @endguest
            </div>

            <button id="menu-toggle" class="md:hidden focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <div id="mobile-menu" class="hidden md:hidden bg-black bg-opacity-80">
            <nav class="flex flex-col space-y-3 px-6 py-4">
                <a href="#home" class="hover:text-indigo-400">Home</a>
                <a href="#activities" class="hover:text-indigo-400">Kegiatan</a>
                <a href="#blog" class="hover:text-indigo-400">Blog</a>
                <a href="#about" class="hover:text-indigo-400">Tentang</a>
                <a href="#contact" class="hover:text-indigo-400">Kontak</a>

                @guest
                    <a href="{{ route('login') }}" class="hover:text-indigo-400">Login</a>
                    <a href="{{ route('register') }}" class="hover:text-indigo-400">Register</a>
                @else
                    <a href="{{ url('/profile') }}" class="hover:text-indigo-400">Profil</a>
                    <a href="{{ url('/pesanan-saya') }}" class="hover:text-indigo-400">Pesanan</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="hover:text-red-400 text-left">Logout</button>
                    </form>
                @endguest
            </nav>
        </div>
    </header>


    <section id="home" class="relative h-screen bg-cover bg-center flex flex-col justify-center items-center text-center text-white"
             style="background-image: url('https://images.unsplash.com/photo-1519681393784-d120267933ba?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');">

        <div class="bg-black bg-opacity-50 absolute inset-0"></div>

        <div class="relative z-10 px-6">

            <h1 class="text-5xl md:text-7xl font-extrabold mb-4 drop-shadow-lg">
                Triplay Healing
            </h1>
            <p class="text-lg md:text-2xl max-w-2xl mx-auto mb-16">
                Nikmati pengalaman healing terbaik melalui alam, perjalanan, dan ketenangan batin.
            </p>

            <div class="flex justify-center space-x-6 md:space-x-12">

                <a href="{{ route('destinations.index', ['category' => 'hiking']) }}" class="flex flex-col items-center text-gray-200 hover:text-white transition group">
                    <div class="p-5 bg-white bg-opacity-10 rounded-xl mb-3 group-hover:bg-opacity-20 transition">
                        <svg class="w-10 h-10 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-6.364-.386 1.591-1.591M3 12H5.25m.386-6.364 1.591 1.591M12 12a2.25 2.25 0 0 0-2.25 2.25c0 1.35.54 2.56 1.386 3.465a.449.449 0 0 0 .628 0c.846-.905 1.386-2.115 1.386-3.465A2.25 2.25 0 0 0 12 12Z" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium">Hiking</span>
                </a>

                <a href="{{ route('destinations.index', ['category' => 'trekking']) }}" class="flex flex-col items-center text-gray-200 hover:text-white transition group">
                    <div class="p-5 bg-white bg-opacity-10 rounded-xl mb-3 group-hover:bg-opacity-20 transition">
                        <svg class="w-10 h-10 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.5-13.5H18M18 21h-5.25M6 18V6.75M3 12h18" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium">Trekking</span>
                </a>

                <a href="{{ route('destinations.index', ['category' => 'camping']) }}" class="flex flex-col items-center text-gray-200 hover:text-white transition group">
                    <div class="p-5 bg-white bg-opacity-10 rounded-xl mb-3 group-hover:bg-opacity-20 transition">
                        <svg class="w-10 h-10 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25L3 7.5m18 0v9l-9 5.25-9-5.25V7.5M3 16.5l9-5.25 9 5.25" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium">Camping</span>
                </a>

            </div>
        </div>

    </section>

    <section id="activities" class="relative h-screen overflow-hidden text-center text-white">
        <div id="hero-slider" class="absolute inset-0 transition-opacity duration-1000">
            <div class="slider-item absolute inset-0 bg-cover bg-center opacity-100"
                 style="background-image: url('https://placehold.co/1920x1080/4F46E5/FFFFFF?text=Mountain+Adventure');"></div>
            <div class="slider-item absolute inset-0 bg-cover bg-center opacity-0"
                 style="background-image: url('https://placehold.co/1920x1080/059669/FFFFFF?text=Land+Trekking');"></div>
            <div class="slider-item absolute inset-0 bg-cover bg-center opacity-0"
                 style="background-image: url('https://placehold.co/1920x1080/FBBF24/000000?text=Forest+Camping');"></div>
        </div>
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative z-10 flex flex-col justify-center items-center h-full px-6">
            <h2 class="text-5xl font-extrabold mb-6 drop-shadow-lg">Kegiatan: Mountain / Land</h2>
            <p class="max-w-3xl text-lg mb-10 opacity-90">
                Temukan petualangan sejati di antara alam dan gunung dengan layanan healing terbaik kami.
            </p>
            @guest
    <a href="{{ route('login') }}"
       class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-8 rounded-full shadow-lg transition duration-300 transform hover:scale-105 uppercase tracking-wider">
        Selengkapnya
    </a>
@endguest

@auth
    <a href="{{ route('activities') }}"
       class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-8 rounded-full shadow-lg transition duration-300 transform hover:scale-105 uppercase tracking-wider">
        Selengkapnya
    </a>
@endauth

        </div>
    </section>

    <section id="blog" class="py-20 bg-white text-center">
        <h2 class="text-4xl font-bold mb-10 text-gray-800">Blog</h2>
        <div class="max-w-5xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="p-6 bg-gray-100 rounded-2xl shadow-lg">
                <h3 class="font-bold text-xl mb-2">Tips Healing di Alam</h3>
                <p class="text-gray-600">Cara menjaga ketenangan selama perjalanan outdoor.</p>
            </div>
            <div class="p-6 bg-gray-100 rounded-2xl shadow-lg">
                <h3 class="font-bold text-xl mb-2">Destinasi Favorit</h3>
                <p class="text-gray-600">Temukan lokasi terbaik untuk healing dan refleksi diri.</p>
            </div>
            <div class="p-6 bg-gray-100 rounded-2xl shadow-lg">
                <h3 class="font-bold text-xl mb-2">Peralatan Penting</h3>
                <p class="text-gray-600">Persiapkan barang wajib untuk perjalanan nyaman.</p>
            </div>
        </div>
    </section>

    <section id="about" class="py-20 bg-gray-50 text-center">
        <h2 class="text-4xl font-bold mb-6 text-gray-800">Tentang Kami</h2>
        <p class="max-w-3xl mx-auto text-gray-600 text-lg">
            Triplay Healing adalah komunitas pecinta alam yang berfokus pada pengalaman healing alami.
            Kami percaya bahwa keindahan alam dapat menyembuhkan dan menumbuhkan semangat hidup.
        </p>
    </section>

    <section id="contact" class="py-20 bg-white text-center">
        <h2 class="text-4xl font-bold mb-6 text-gray-800">Kontak Kami</h2>
        <p class="text-gray-600 mb-4">Hubungi kami untuk reservasi, kolaborasi, atau pertanyaan seputar layanan kami.</p>
        <p class="font-medium text-gray-700">📧 triplayhealing@gmail.com | 📞 +62 812 3456 7890</p>
    </section>

    <footer class="bg-gray-900 text-white text-center py-8">
        <p>&copy; {{ date('Y') }} Triplay Healing. All rights reserved.</p>
    </footer>

    <script>
        const slides = document.querySelectorAll('.slider-item');
        let currentSlide = 0;
        setInterval(() => {
            slides[currentSlide].classList.remove('opacity-100');
            slides[currentSlide].classList.add('opacity-0');
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].classList.remove('opacity-0');
            slides[currentSlide].classList.add('opacity-100');
        }, 5000);

        // Mobile Menu Toggle
        const toggle = document.getElementById('menu-toggle');
        const menu = document.getElementById('mobile-menu');
        toggle.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
