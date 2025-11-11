@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-16 min-h-screen">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-3">Pilih Pengalaman Healing Anda</h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
            Kami membagi pengalaman TripPlay Healing ke dalam tiga kategori utama di darat dan gunung.
        </p>
    </div>

    <!-- Grid 3 Kartu Kategori -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

        <!-- Kartu 1: HIKING -->
        <a href="{{ route('destinations.index', ['category' => 'hiking']) }}" class="block transform hover:scale-105 transition duration-300">
            <div class="bg-white rounded-xl shadow-xl overflow-hidden group">
                <div class="h-48 bg-cover bg-center" style="background-image: url('https://placehold.co/600x400/10B981/FFFFFF?text=HIKING');"></div>
                <div class="p-6">
                    <h2 class="text-3xl font-bold text-gray-800 mb-2 group-hover:text-indigo-600">Hiking</h2>
                    <p class="text-gray-600 mb-4">Perjalanan singkat hingga menengah di medan yang sudah terbentuk. Cocok untuk pemula dan relaksasi cepat.</p>
                    <span class="text-indigo-600 font-semibold flex items-center">
                        Jelajahi Lokasi
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                          <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>
            </div>
        </a>

        <!-- Kartu 2: TREKKING -->
        <a href="{{ route('destinations.index', ['category' => 'trekking']) }}" class="block transform hover:scale-105 transition duration-300">
            <div class="bg-white rounded-xl shadow-xl overflow-hidden group">
                <div class="h-48 bg-cover bg-center" style="background-image: url('https://placehold.co/600x400/2563EB/FFFFFF?text=TREKKING');"></div>
                <div class="p-6">
                    <h2 class="text-3xl font-bold text-gray-800 mb-2 group-hover:text-indigo-600">Trekking</h2>
                    <p class="text-gray-600 mb-4">Penjelajahan multi-hari di alam liar. Membutuhkan persiapan fisik lebih, memberikan pengalaman healing mendalam.</p>
                    <span class="text-indigo-600 font-semibold flex items-center">
                        Jelajahi Lokasi
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                          <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>
            </div>
        </a>

        <!-- Kartu 3: CAMPING -->
        <a href="{{ route('destinations.index', ['category' => 'camping']) }}" class="block transform hover:scale-105 transition duration-300">
            <div class="bg-white rounded-xl shadow-xl overflow-hidden group">
                <div class="h-48 bg-cover bg-center" style="background-image: url('https://placehold.co/600x400/F59E0B/000000?text=CAMPING');"></div>
                <div class="p-6">
                    <h2 class="text-3xl font-bold text-gray-800 mb-2 group-hover:text-indigo-600">Camping</h2>
                    <p class="text-gray-600 mb-4">Menghabiskan malam di bawah bintang. Fokus pada relaksasi, api unggun, dan keindahan alam di satu lokasi.</p>
                    <span class="text-indigo-600 font-semibold flex items-center">
                        Jelajahi Lokasi
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                          <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>
            </div>
        </a>

    </div>
</div>
@endsection
