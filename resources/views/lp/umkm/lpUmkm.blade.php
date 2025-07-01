@extends('partials.lp.main')
@section('content')
    <section class="py-12 px-4 md:px-8 lg:px-16 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h2 class="text-1xl md:text-2xl font-bold text-gray-800 mb-4">UMKM Lokal Kami</h2>
                <p class="text-sm text-gray-600 max-w-3xl mx-auto">
                    Dukung produk-produk berkualitas dari pelaku usaha mikro, kecil, dan menengah di daerah kami.
                </p>
            </div>

            <!-- Filter Kategori -->
            <div class="category-list flex flex-wrap gap-3 mb-8 justify-start">
                <a href="{{ route('lp.umkm.index') }}"
                    class="category-item px-3 py-1 {{ !request('kategori') ? 'bg-green-600 text-white hover:bg-green-700' : 'bg-white hover:bg-gray-100' }} rounded-full text-sm md:text-base font-small transition-colors duration-200 border border-gray-200 shadow-sm">
                    Semua
                </a>
                @foreach ($kategories as $kategori)
                    <a href="{{ route('lp.umkm.index', ['kategori' => $kategori->id]) }}"
                        class="category-item px-3 py-1 {{ request('kategori') == $kategori->id ? 'bg-green-600 text-white hover:bg-green-700' : 'bg-white hover:bg-gray-100' }} rounded-full text-sm md:text-base font-small transition-colors duration-200 border border-gray-200 shadow-sm">
                        {{ $kategori->nama }}
                    </a>
                @endforeach
            </div>

            <!-- UMKM Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @if ($umkms->isNotEmpty())
                    @foreach ($umkms as $umkm)
                        <div class="max-w-sm bg-white rounded-xl shadow-md overflow-hidden p-4 space-y-4">
                            <!-- Judul dan Nama -->
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800">{{ $umkm->nama }}</h2>
                                <div class="flex items-center text-sm text-gray-500">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                        <path
                                            d="M5.121 17.804A3 3 0 016 16h12a3 3 0 01.879 1.804M16 8a4 4 0 10-8 0 4 4 0 008 0zM4 21h16" />
                                    </svg>
                                    {{ $umkm->pemilik }}
                                    {{-- <svg class="w-4 h-4 text-green-500 ml-1" fill="none" stroke="currentColor"
                                        stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 6L9 17l-5-5" />
                                    </svg> --}}
                                </div>
                            </div>

                            <!-- Gambar -->
                            @if ($umkm->gambar)
                                <div class="aspect-[4/3] w-full overflow-hidden rounded-lg">
                                    <img src="{{ asset('storage/umkm_images/' . $umkm->gambar) }}" alt="{{ $umkm->nama }}"
                                        class="w-full h-full object-cover" />
                                </div>
                            @else
                                <div class="aspect-[4/3] w-full bg-gray-200 flex items-center justify-center rounded-lg">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                            @endif

                            <!-- Harga -->
                            {{-- <p class="text-gray-700 font-bold">Rp 500 – 2.500/Biji</p> --}}

                            <!-- Deskripsi -->
                            <p class="text-sm text-gray-600">{{ $umkm->deskripsi }}</p>

                            <!-- Tombol Sosial -->
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Pesan melalui :</p>
                                <div class="flex space-x-4">
                                    <a href="https://wa.me/{{ $umkm->no_hp }}" target="_blank"
                                        class="text-green-500 hover:scale-110 transition"><i
                                            class="fab fa-whatsapp fa-2x"></i></a>
                                    <a href="#" class="text-blue-600 hover:scale-110 transition"><i
                                            class="fab fa-facebook fa-2x"></i></a>
                                    <a href="#" class="text-pink-500 hover:scale-110 transition"><i
                                            class="fab fa-instagram fa-2x"></i></a>
                                </div>
                                <a href="{{ route('lp.umkm.show', $umkm->id) }}"
                                                class="text-sm text-blue-600 hover:text-blue-800 font-medium">Lihat
                                                →</a>
                            </div>
                        </div>
                        <!-- Card UMKM -->
                        <!-- <div
                                    class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 h-full flex flex-col">
                                    <div class="relative h-48">
                                        @if ($umkm->gambar)
    <img src="{{ asset('storage/umkm_images/' . $umkm->gambar) }}" alt="{{ $umkm->nama }}"
                                                class="w-full h-full object-cover">
@else
    <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                            </div>
    @endif

                                        @if ($umkm->created_at->diffInDays(now()) < 7)
    <span
                                                class="absolute top-3 left-3 bg-blue-500 text-white text-xs px-2 py-1 rounded-full">Baru</span>
    @endif
                                    </div>
                                    <div class="p-5 flex flex-col flex-grow">
                                        <div class="flex items-center mb-3">
                                            {{-- @if ($umkm->user->profile_photo_path)
                                    <img src="" alt="{{ $umkm->pemilik }}" class="w-10 h-10 rounded-full object-cover mr-3">
                                @else --}}
                                            <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center mr-3">
                                                <span
                                                    class="text-gray-600 text-lg">{{ strtoupper(substr($umkm->pemilik, 0, 1)) }}</span>
                                            </div>
                                            {{-- @endif --}}
                                            <span class="font-medium text-gray-800">{{ $umkm->pemilik }}</span>
                                        </div>
                                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $umkm->nama }}</h3>
                                        <p class="text-gray-600 text-sm mb-4 line-clamp-2 flex-grow">
                                            {{ $umkm->deskripsi }}
                                        </p>
                                        <div class="flex justify-between items-center mt-auto">
                                            <a href="https://wa.me/{{ $umkm->no_hp }}" target="_blank"
                                                class="inline-flex items-center justify-center w-8 h-8 bg-green-500 text-white rounded-full hover:bg-green-600 transition-colors duration-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" viewBox="0 0 16 16">
                                                    <path
                                                        d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                                                </svg>
                                            </a>
                                            <a href="{{ route('lp.umkm.show', $umkm->id) }}"
                                                class="text-sm text-blue-600 hover:text-blue-800 font-medium">Lihat
                                                →</a>
                                        </div>
                                    </div>
                                </div> -->
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
                            <h3 class="mt-4 text-lg font-medium text-gray-900">Tidak ada produk UMKM</h3>
                            <p class="mt-2 text-gray-600">Belum ada produk UMKM yang tersedia saat ini.</p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Pagination -->
            @if ($umkms->isNotEmpty())
                <div class="mt-12">
                    {{-- {{ $umkms->appends(request()->query())->links() }} --}}
                </div>
            @endif
        </div>
    </section>
@endsection
