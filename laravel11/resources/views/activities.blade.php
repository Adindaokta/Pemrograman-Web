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
    <div class="border-t border-gray-200 my-10"></div>


    <div class="mb-12">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-extrabold text-gray-900">Semua Petualangan Kami</h2>
            <p class="text-gray-600 mt-2">Temukan paket healing terbaik yang telah kami kurasi untuk Anda.</p>
        </div>

        @if($destinations->isEmpty())
            <div class="text-center py-10 bg-gray-50 rounded-xl border border-dashed border-gray-300">
                <p class="text-gray-500 italic text-lg">Belum ada paket perjalanan yang tersedia saat ini.</p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($destinations as $destination)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300 border border-gray-100 flex flex-col">
                        
                        <div class="relative h-56">
                            <img src="{{ asset('storage/' . $destination->image) }}" 
                                 alt="{{ $destination->name }}" 
                                 class="w-full h-full object-cover">
                            
                            <div class="absolute top-4 right-4">
                                <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide shadow-sm
                                    {{ $destination->category == 'hiking' ? 'bg-green-100 text-green-800' : 
                                      ($destination->category == 'camping' ? 'bg-yellow-100 text-yellow-800' : 'bg-blue-100 text-blue-800') }}">
                                    {{ $destination->category }}
                                </span>
                            </div>
                        </div>

                        <div class="p-6 flex-1 flex flex-col">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-1">
                                {{ $destination->name }}
                            </h3>
                            
                            {{-- Deskripsi Singkat (strip_tags untuk keamanan, limit 100 karakter) --}}
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2 flex-1">
                                {{ Str::limit(strip_tags($destination->description), 100) }}
                            </p>

                            <div class="border-t border-gray-100 pt-4 mt-auto">
                                <div class="flex justify-between items-center mb-4">
                                    <div class="text-indigo-600 font-bold text-lg">
                                        Rp {{ number_format($destination->price, 0, ',', '.') }}
                                    </div>
                                    <div class="text-gray-500 text-xs flex items-center">
                                        <i class="fa-solid fa-user mr-1"></i> / pax
                                    </div>
                                </div>

                                <a href="{{ route('destinations.show', $destination->id) }}" 
                                   class="block w-full py-2 px-4 bg-gray-900 hover:bg-indigo-600 text-white text-center font-semibold rounded-lg transition duration-300">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-10">
                {{-- Cek apakah variabel memiliki method links (berarti hasil pagination) --}}
                @if(method_exists($destinations, 'links'))
                    {{ $destinations->links() }}
                @endif
            </div>
        @endif
    </div>

</div> @endsection
