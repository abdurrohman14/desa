<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-red-700">
                Berita Terkini
            </h2>
            <a href="{{ route('lp.berita.index') }}" class="text-red-600 hover:text-red-800 font-medium">Lihat Semua <i
                    class="fas fa-arrow-right ml-1"></i></a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Berita 1 -->
            @if ($beritas && $beritas->isNotEmpty())
                @foreach ($beritas as $berita)
                    <div
                        class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition-shadow">
                        <img src="{{ asset('storage/berita_images/' . $berita->gambar) }}" alt="Berita 1"
                            class="w-full h-48 object-cover" />
                        <div class="p-4">
                            <span class="text-sm text-red-600">{{ $berita->created_at->format('d F Y') }}</span>
                            <h3 class="font-bold text-lg my-2">
                                {{ $berita->judul }}
                            </h3>
                            <p class="text-gray-600 text-sm">
                                {{ $berita->isi }}
                            </p>
                            <a href="{{ route('lp.berita.show', $berita->slug) }}"
                                class="text-red-600 hover:text-red-800 text-sm font-medium mt-3 inline-block">Baca
                                Selengkapnya</a>
                        </div>
                    </div>
                @endforeach
            @else
                <span>Tidak ada berita</span>
            @endif
        </div>
    </div>
</section>
