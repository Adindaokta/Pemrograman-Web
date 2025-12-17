@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Manajemen Destinasi</h2>
    <a href="{{ route('admin.destinations.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow">
        <i class="fas fa-plus mr-2"></i> Tambah Paket
    </a>
</div>

@if(session('success'))
    <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-4">{{ session('success') }}</div>
@endif

<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="w-full text-left">
        <thead class="bg-gray-50 text-gray-600 uppercase text-sm font-semibold">
            <tr>
                <th class="p-4">Gambar</th>
                <th class="p-4">Nama Paket</th>
                <th class="p-4">Kategori</th>
                <th class="p-4">Harga</th>
                <th class="p-4 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach($destinations as $item)
            <tr class="hover:bg-gray-50 transition">
                <td class="p-4">
                    <img src="{{ asset('storage/' . $item->image) }}" class="w-16 h-12 object-cover rounded">
                </td>
                <td class="p-4 font-bold text-gray-900">{{ $item->title }}</td>
                <td class="p-4">
                    <span class="px-3 py-1 text-xs font-bold uppercase rounded-full 
                        {{ $item->category == 'hiking' ? 'bg-green-100 text-green-800' : 
                          ($item->category == 'camping' ? 'bg-yellow-100 text-yellow-800' : 'bg-blue-100 text-blue-800') }}">
                        {{ $item->category }}
                    </span>
                </td>
                <td class="p-4">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                <td class="p-4 flex justify-center space-x-2">
                    <a href="{{ route('destinations.show', $item->id) }}" target="_blank" title="Lihat Tampilan User"
                       class="bg-teal-500 hover:bg-teal-600 text-white px-3 py-1 rounded text-sm transition">
                        <i class="fas fa-eye"></i> Preview
                    </a>

                    <a href="{{ route('admin.destinations.edit', $item->id) }}" title="Edit"
                       class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm transition">
                        <i class="fas fa-edit"></i>
                    </a>

                    <form action="{{ route('admin.destinations.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm transition" title="Hapus">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="p-4">
        {{ $destinations->links() }}
    </div>
</div>
@endsection