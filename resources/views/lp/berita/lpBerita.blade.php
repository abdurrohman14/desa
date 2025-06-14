@extends('partials.lp.main')
@section('content')
    <!-- Section Kategori dengan Search -->
    <section class="categories py-8 px-4 md:px-8 lg:px-16 bg-blue-50">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            <h3 class="text-xl md:text-2xl font-bold flex items-center">
                <span class="mr-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="size-6 mt-1">
                        <path fill-rule="evenodd"
                            d="M4.125 3C3.089 3 2.25 3.84 2.25 4.875V18a3 3 0 0 0 3 3h15a3 3 0 0 1-3-3V4.875C17.25 3.839 16.41 3 15.375 3H4.125ZM12 9.75a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5H12Zm-.75-2.25a.75.75 0 0 1 .75-.75h1.5a.75.75 0 0 1 0 1.5H12a.75.75 0 0 1-.75-.75ZM6 12.75a.75.75 0 0 0 0 1.5h7.5a.75.75 0 0 0 0-1.5H6Zm-.75 3.75a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5H6a.75.75 0 0 1-.75-.75ZM6 6.75a.75.75 0 0 0-.75.75v3c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75v-3A.75.75 0 0 0 9 6.75H6Z"
                            clip-rule="evenodd" />
                        <path d="M18.75 6.75h1.875c.621 0 1.125.504 1.125 1.125V18a1.5 1.5 0 0 1-3 0V6.75Z" />
                    </svg>
                </span>
                Kategori Berita
            </h3>

            <!-- Search Bar -->
            <div class="relative w-full md:w-auto">
                <form action="{{ route('lp.berita.search') }}" method="GET" class="relative w-full md:w-auto">
                    <input type="text" name="q" placeholder="Cari berita..." value="{{ request('q') }}"
                        class="w-full pl-10 pr-4 py-2 text-sm border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                    <button type="submit" class="absolute left-3 top-2.5 h-5 w-5 text-gray-400">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        <div class="category-list flex flex-wrap gap-3">
            <a href="{{ route('lp.berita.index') }}"
                class="category-item px-4 py-1.5 {{ !request('kategori') ? 'bg-green-600 text-white hover:bg-green-700' : 'bg-white hover:bg-gray-100' }} rounded-full text-xs md:text-sm font-medium transition-colors duration-200 border border-gray-200">
                Semua
            </a>
            @foreach ($kategories as $kategori)
                <a href="{{ route('lp.berita.index', ['kategori' => $kategori->id]) }}"
                    class="category-item px-4 py-1.5 {{ request('kategori') == $kategori->id ? 'bg-green-600 text-white hover:bg-green-700' : 'bg-white hover:bg-gray-100' }} rounded-full text-xs md:text-sm font-medium transition-colors duration-200 border border-gray-200">
                    {{ $kategori->nama }}
                </a>
            @endforeach
        </div>
    </section>

    <!-- Section Berita -->
    <section class="trending-news py-8 px-4 md:px-8 lg:px-16">
        <h3 class="text-xl md:text-2xl font-bold mb-6 flex items-center">
            <span class="mr-2"></span> Berita Terkini
        </h3>

        <div class="news-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @if ($beritas->isNotEmpty())
                @foreach ($beritas as $berita)
                    <!-- Card Berita 1 -->
                    <div
                        class="news-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                        <img src="{{ asset('storage/berita_images/' . $berita->gambar) }}" alt="Berita 1"
                            class="w-full h-48 object-cover" />
                        <div class="p-5">
                            <span
                                class="inline-block px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-semibold">{{ $berita->kategori->nama }}</span>
                            <h4 class="text-lg font-bold mt-2 mb-2 line-clamp-2">
                                {{ $berita->judul }}
                            </h4>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                {{ $berita->isi }}
                            </p>
                            <div class="flex justify-between items-center text-xs text-gray-500">
                                <span>{{ $berita->created_at->diffForHumans() }}</span>
                                <a href="{{ route('lp.berita.show', $berita->slug) }}"
                                    class="text-blue-600 font-medium hover:text-blue-800 transition-colors duration-200">
                                    Baca Selengkapnya →
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-span-4 text-center py-12">
                    <div class="bg-white p-8 rounded-xl shadow-sm max-w-md mx-auto">
                        <svg class="w-16 h-16 mx-auto text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                        <h3 class="mt-4 text-lg font-medium text-gray-900">Tidak ada berita</h3>
                        <p class="mt-2 text-gray-600">Belum ada berita yang tersedia saat ini.</p>
                    </div>
                </div>
            @endif

            <!-- Pagination di Bawah Content Berita -->
            <div class="mt-10">
                {{ $beritas->appends(request()->query())->links() }}
            </div>
    </section>
@endsection
