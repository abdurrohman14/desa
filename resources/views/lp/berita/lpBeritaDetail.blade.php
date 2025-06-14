@extends('partials.lp.main')
@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Kolom 1: Detail Berita -->
        <div class="lg:w-2/3">
            <article class="bg-white rounded-lg shadow-md overflow-hidden">
                <!-- Gambar Berita -->
                <img src="{{asset('storage/berita_images/' . $berita->gambar)}}" alt="Gambar Berita"
                    class="w-full h-64 object-cover">

                <!-- Konten Berita -->
                <div class="p-6">
                    <div class="flex items-center text-sm text-gray-500 mb-2">
                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded">{{$berita->kategori->nama}}</span>
                        <span class="mx-2">•</span>
                        <span>12 Mei 2023</span>
                        <span class="mx-2">•</span>
                        <span>Penulis: John Doe</span>
                    </div>

                    <h1 class="text-2xl font-bold text-gray-800 mb-4">{{$berita->judul}}</h1>

                    <div class="prose max-w-none text-gray-700 mb-6">
                        <p class="mb-4">{{$berita->isi}}</p>

                        <p class="mb-4">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                            deserunt mollit anim id est laborum.</p>

                        <h2 class="text-xl font-semibold mt-6 mb-3">Analisis Kebijakan</h2>

                        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dui mauris.
                            Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut
                            eleifend nibh porttitor.</p>

                        <blockquote class="border-l-4 border-blue-500 pl-4 italic my-4">
                            "Kami berkomitmen untuk meningkatkan kesejahteraan rakyat melalui program-program konkret yang
                            menyentuh langsung kebutuhan dasar masyarakat."
                        </blockquote>

                        <p class="mb-4">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                            doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                            architecto beatae vitae dicta sunt explicabo.</p>
                    </div>
                </div>
            </article>
        </div>

        <!-- Kolom 2: Berita Terkait -->
        <div class="lg:w-1/3">
            <div class="bg-white rounded-lg shadow-md p-6 sticky top-4">
                <h2 class="text-xl font-bold text-gray-800 mb-6 pb-2 border-b border-gray-200">Berita Terkait</h2>

                <div class="space-y-6">
                    <!-- Berita Terkait 1 -->
                    @if ($beritaTerkait->isNotEmpty())
                        @foreach ($beritaTerkait as $berita)
                            <article class="flex gap-4">
                                <div class="flex-shrink-0 w-24 h-24">
                                    <img src="{{ asset('storage/berita_images/' . $berita->gambar) }}" alt="Gambar Berita"
                                        class="w-full h-full object-cover rounded">
                                </div>
                                <div>
                                    <span class="text-xs font-medium text-blue-600">{{$berita->kategori->nama}}</span>
                                    <h3 class="text-sm font-semibold text-gray-800 mt-1 hover:text-blue-600">
                                        <a href="{{ route('lp.berita.show', $berita->slug) }}">{{$berita->judul}}</a>
                                    </h3>
                                    <p class="text-xs text-gray-500 mt-1">{{$berita->created_at->format('d M Y')}}</p>
                                </div>
                            </article>
                        @endforeach
                    @else
                        <p class="text-gray-500">Tidak ada berita terkait yang ditemukan.</p>
                    @endif
                </div>

                <!-- Tombol Lihat Semua -->
                <div class="mt-6 pt-4 border-t border-gray-200">
                    <a href="{{route('lp.berita.index')}}" class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center">
                        Lihat Semua Berita Terkait
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
