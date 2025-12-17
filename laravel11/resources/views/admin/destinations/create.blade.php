<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Destinasi</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('destinations.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Nama Kegiatan/Tempat</label>
                        <input type="text" name="title" class="w-full border-gray-300 rounded shadow-sm focus:ring focus:ring-indigo-200" required>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Kategori</label>
                            <select name="category" class="w-full border-gray-300 rounded shadow-sm">
                                <option value="hiking">Hiking</option>
                                <option value="trekking">Trekking</option>
                                <option value="camping">Camping</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Harga (Rp)</label>
                            <input type="number" name="price" class="w-full border-gray-300 rounded shadow-sm" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Deskripsi Lengkap</label>
                        <textarea name="description" rows="5" class="w-full border-gray-300 rounded shadow-sm" required></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Foto Utama</label>
                        <input type="file" name="image" class="w-full border p-2 rounded" accept="image/*" required>
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('destinations.dashboard') }}" class="text-gray-500 font-bold py-2 px-4 mr-2">Batal</a>
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Simpan Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>