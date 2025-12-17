<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Destinasi</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('destinations.update', $destination->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Nama Kegiatan</label>
                        <input type="text" name="title" value="{{ $destination->title }}" class="w-full border-gray-300 rounded shadow-sm" required>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Kategori</label>
                            <select name="category" class="w-full border-gray-300 rounded shadow-sm">
                                <option value="hiking" {{ $destination->category == 'hiking' ? 'selected' : '' }}>Hiking</option>
                                <option value="trekking" {{ $destination->category == 'trekking' ? 'selected' : '' }}>Trekking</option>
                                <option value="camping" {{ $destination->category == 'camping' ? 'selected' : '' }}>Camping</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Harga (Rp)</label>
                            <input type="number" name="price" value="{{ $destination->price }}" class="w-full border-gray-300 rounded shadow-sm" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Deskripsi</label>
                        <textarea name="description" rows="5" class="w-full border-gray-300 rounded shadow-sm" required>{{ $destination->description }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Foto (Biarkan kosong jika tidak diganti)</label>
                        @if($destination->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $destination->image) }}" class="w-32 rounded">
                            </div>
                        @endif
                        <input type="file" name="image" class="w-full border p-2 rounded" accept="image/*">
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('destinations.dashboard') }}" class="text-gray-500 font-bold py-2 px-4 mr-2">Batal</a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>