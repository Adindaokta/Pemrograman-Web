@extends('layouts.admin')

@section('content')
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Overview Dashboard</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-indigo-500 flex items-center">
            <div class="p-3 rounded-full bg-indigo-100 text-indigo-500 mr-4">
                <i class="fas fa-map-marked-alt text-2xl"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Total Paket Wisata</p>
                <h3 class="text-2xl font-bold">{{ $totalDestinations }}</h3>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-green-500 flex items-center">
            <div class="p-3 rounded-full bg-green-100 text-green-500 mr-4">
                <i class="fas fa-users text-2xl"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Total User Terdaftar</p>
                <h3 class="text-2xl font-bold">{{ $totalUsers }}</h3>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-6">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Paket Ditambahkan Terakhir</h3>
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="text-gray-500 border-b">
                    <th class="py-3">Nama Paket</th>
                    <th class="py-3">Kategori</th>
                    <th class="py-3">Harga</th>
                    <th class="py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentDestinations as $item)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 font-semibold">{{ $item->name }}</td>
                    <td class="py-3">
                        <span class="px-2 py-1 text-xs font-bold rounded bg-gray-200">{{ ucfirst($item->category) }}</span>
                    </td>
                    <td class="py-3 text-indigo-600 font-bold">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                    <td class="py-3">
                        <a href="{{ route('admin.destinations.edit', $item->id) }}" class="text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection