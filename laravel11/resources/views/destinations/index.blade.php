@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">
    <h1 class="text-3xl font-bold text-center mb-3">Kegiatan: {{ ucfirst($category) }}</h1>
    <p class="text-center text-gray-600 mb-10">
        Jelajahi petualangan {{ strtolower($category) }} terbaik kami. Temukan pengalaman healing yang memadukan alam, ketenangan, dan tantangan.
    </p>

    @if($destinations->isEmpty())
        <div class="text-center text-gray-500 italic">
            Belum ada data destinasi untuk kategori ini.
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($destinations as $destination)
                <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->name }}" class="w-full h-56 object-cover">
                    <div class="p-5">
                        <h2 class="text-xl font-semibold mb-2">{{ $destination->name }}</h2>
                        <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ $destination->description }}</p>
                        <p class="text-sm text-gray-500 mb-3"><i class="fa-solid fa-location-dot"></i> {{ $destination->location }}</p>
                        <a href="{{ route('destinations.show', $destination->id) }}" class="inline-block px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
