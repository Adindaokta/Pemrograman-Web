<x-app-layout>
    {{-- LOGIC SEDERHANA (Tanpa Regex Rumit dulu untuk cek error) --}}
    @php
        // Cek deskripsi, jika kosong isi default
        $desc = $destination->description ?? 'Tidak ada deskripsi.';
        
        // Cek Image url
        $bgImage = $destination->image 
            ? asset("storage/" . $destination->image) 
            : 'https://placehold.co/1200x800?text=No+Image';
    @endphp

    {{-- BAGIAN HERO --}}
    <div class="relative h-[50vh] lg:h-[65vh] w-full bg-cover bg-center bg-gray-900" 
         style="background-image: url('{{ $bgImage }}');">
        
        <div class="absolute inset-0 bg-black/50"></div>

        <div class="absolute inset-0 flex flex-col items-center justify-center p-6 text-center">
            <h1 class="mb-6 text-4xl md:text-5xl lg:text-7xl font-extrabold text-white drop-shadow-2xl tracking-tight leading-tight max-w-4xl">
                {{ $destination->title }}
            </h1>

            <span class="px-4 py-2 rounded-full text-sm font-bold uppercase tracking-wider bg-white/20 backdrop-blur-md text-white border border-white/30">
                {{ $destination->category }}
            </span>
        </div>

    </div>

    {{-- BAGIAN KONTEN --}}
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pb-16 relative z-10">
        
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden -mt-24 border border-gray-100">
            
            <div class="p-8 md:p-12">
                
                {{-- Info Harga --}}
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-6 border-b border-gray-100 pb-8">
                    <div>
                        <h2 class="text-gray-500 text-sm font-semibold uppercase tracking-wide mb-1">Total Biaya Paket</h2>
                        <div class="flex items-center gap-2">
                            <span class="text-4xl font-extrabold text-indigo-600">
                                Rp {{ number_format($destination->price, 0, ',', '.') }}
                            </span>
                            <span class="text-gray-500 font-medium self-end mb-1">/ pax</span>
                        </div>
                    </div>
                </div>

                {{-- DESKRIPSI --}}
                <div class="prose prose-lg prose-indigo max-w-none text-gray-600 leading-relaxed text-justify">
                    {!! $desc!!}
                </div>

                {{-- TOMBOL AKSI --}}
                <div class="mt-12 bg-gray-50 rounded-2xl p-6 md:p-8 flex flex-col md:flex-row gap-4 items-center justify-between border border-gray-200">
                    <div class="text-center md:text-left">
                        <h3 class="font-bold text-gray-900 text-lg">Tertarik dengan destinasi ini?</h3>
                        <p class="text-gray-500 text-sm">Segera amankan slot Anda.</p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                        <a href="{{ url()->previous() }}" 
                           class="w-full sm:w-auto px-6 py-3.5 bg-white border border-gray-300 hover:bg-gray-100 text-gray-700 font-bold rounded-xl transition-all shadow-sm flex items-center justify-center">
                            Kembali
                        </a>

                        <a href="https://wa.me/6281234567890?text=Halo%20Admin,%20saya%20tertarik%20dengan%20paket%20{{ urlencode($destination->name) }}"
                           target="_blank"
                           class="w-full sm:w-auto px-8 py-3.5 bg-green-600 hover:bg-green-700 text-white font-bold rounded-xl shadow-lg transition-all transform hover:-translate-y-1 flex items-center justify-center gap-2">
                            <span>Booking WhatsApp</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>