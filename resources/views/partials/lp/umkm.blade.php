<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-red-700">
                UMKM Desa
            </h2>
            <a href="{{ route('lp.umkm.index') }}" class="text-red-600 hover:text-red-800 font-medium">Lihat Semua <i
                    class="fas fa-arrow-right ml-1"></i></a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            <!-- UMKM 1 -->
            @if ($umkms && $umkms->isNotEmpty())
                @foreach ($umkms as $umkm)
                    <div
                        class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-100 hover:shadow-md transition-shadow">
                        <img src="{{ asset('storage/umkm_images/' . $umkm->gambar) }}" alt="UMKM 1"
                            class="w-full h-40 object-cover" />
                        <div class="p-4">
                            <h3 class="font-bold mb-1">{{ $umkm->judul }}</h3>
                            <p class="text-gray-600 text-sm mb-2">Oleh: {{ $umkm->pemilik }}</p>
                            <a href="{{ route('lp.umkm.show', $umkm->id) }}" class="text-red-600 hover:text-red-800 text-sm font-medium">Lihat
                                Detail</a>
                        </div>
                    </div>
                @endforeach
            @else
               <span>Tidak ada UMKM</span>
            @endif
        </div>
    </div>
</section>
