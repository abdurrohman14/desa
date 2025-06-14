@extends('partials.lp.main')
@section('content')
    <section class="py-12 px-4 md:px-8 lg:px-16 bg-gray-50">
        <div class="max-w-6xl mx-auto">
            <!-- Breadcrumb -->
            <nav class="flex mb-6" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2">
                    <li class="inline-flex items-center">
                        <a href="/"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                            <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Beranda
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="{{ route('lp.umkm.index') }}"
                                class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">UMKM</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">{{ $umkm->nama }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Main Content -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="md:flex">
                    <!-- Gallery Section -->
                    <div class="md:w-1/2">
                        <div class="h-64 md:h-full bg-gray-100 relative">
                            <img src="{{ asset('storage/umkm_images/' . $umkm->gambar) }}" alt="Produk UMKM"
                                class="w-full h-full object-cover">
                            <div class="absolute bottom-4 left-4 flex space-x-2">
                                <span class="bg-green-500 text-white text-xs px-2 py-1 rounded-full">Bahan Alami</span>
                                <span class="bg-blue-500 text-white text-xs px-2 py-1 rounded-full">Handmade</span>
                            </div>
                        </div>
                        <div class="grid grid-cols-4 gap-2 p-4">
                            <div class="h-20 bg-gray-200 rounded-md overflow-hidden cursor-pointer">
                                <img src="https://source.unsplash.com/random/200x200/?textile1" alt="Produk 1"
                                    class="w-full h-full object-cover">
                            </div>
                            <div class="h-20 bg-gray-200 rounded-md overflow-hidden cursor-pointer">
                                <img src="https://source.unsplash.com/random/200x200/?textile2" alt="Produk 2"
                                    class="w-full h-full object-cover">
                            </div>
                            <div class="h-20 bg-gray-200 rounded-md overflow-hidden cursor-pointer">
                                <img src="https://source.unsplash.com/random/200x200/?textile3" alt="Produk 3"
                                    class="w-full h-full object-cover">
                            </div>
                            <div class="h-20 bg-gray-200 rounded-md overflow-hidden cursor-pointer">
                                <img src="https://source.unsplash.com/random/200x200/?textile4" alt="Produk 4"
                                    class="w-full h-full object-cover">
                            </div>
                        </div>
                    </div>

                    <!-- Detail Section -->
                    <div class="md:w-1/2 p-6 md:p-8">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                                <img src="{{ asset('storage/umkm_images/' . $umkm->gambar) }}" alt="Pemilik UMKM"
                                    class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h2 class="text-xl font-bold text-gray-800">{{ $umkm->pemilik }}</h2>
                                <p class="text-gray-600 text-sm">Bergabung sejak 2020</p>
                            </div>
                        </div>

                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">{{ $umkm->nama }}</h1>

                        <div class="flex items-center mb-6">
                            {{-- <div class="flex items-center mr-4">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <span class="ml-1 text-gray-800 font-medium">4.8</span>
                            <span class="mx-1 text-gray-400">|</span>
                            <span class="text-gray-600">56 ulasan</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="ml-1 text-gray-600">Terverifikasi</span>
                        </div> --}}
                        </div>

                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Deskripsi Produk</h3>
                            <p class="text-gray-600 leading-relaxed">
                                {{ $umkm->deskripsi }}
                            </p>
                        </div>

                        {{-- <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Varian</h3>
                        <div class="flex flex-wrap gap-2">
                            <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Motif Parang
                            </button>
                            <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Motif Kawung
                            </button>
                            <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Motif Mega Mendung
                            </button>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Harga</h3>
                        <div class="flex items-baseline">
                            <span class="text-3xl font-bold text-gray-800">Rp 350.000</span>
                            <span class="ml-2 text-gray-500">/lembar</span>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                            <button class="px-3 py-2 bg-gray-100 text-gray-600 hover:bg-gray-200">-</button>
                            <span class="px-4 py-2">1</span>
                            <button class="px-3 py-2 bg-gray-100 text-gray-600 hover:bg-gray-200">+</button>
                        </div>
                        <button class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-3 px-6 rounded-lg font-medium transition-colors duration-200">
                            Tambah ke Keranjang
                        </button>
                    </div> --}}
                    </div>
                </div>
            </div>

            <!-- Additional Info Section -->
            {{-- <div class="mt-8 grid md:grid-cols-3 gap-8">
            <!-- Info Pengrajin -->
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Tentang Pengrajin</h3>
                <div class="flex items-start mb-4">
                    <div class="w-16 h-16 rounded-full overflow-hidden mr-4 flex-shrink-0">
                        <img src="https://source.unsplash.com/random/100x100/?man" alt="Pemilik UMKM" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-800">Bapak Surya</h4>
                        <p class="text-gray-600 text-sm">Pengrajin Tenun sejak 2010</p>
                        <div class="flex items-center mt-1">
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <span class="ml-1 text-sm text-gray-600">4.8 (56 ulasan)</span>
                        </div>
                    </div>
                </div>
                <p class="text-gray-600 text-sm">
                    Bapak Surya adalah pengrajin tenun berpengalaman dari Jawa Tengah yang mempertahankan teknik tradisional dalam setiap karyanya. Dengan dedikasi tinggi, beliau melestarikan warisan budaya melalui kain tenun berkualitas.
                </p>
            </div>

            <!-- Lokasi -->
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Lokasi</h3>
                <div class="h-48 bg-gray-200 rounded-lg overflow-hidden mb-4">
                    <img src="https://maps.googleapis.com/maps/api/staticmap?center=Jawa+Tengah&zoom=11&size=600x300&maptype=roadmap&markers=color:red%7CJawa+Tengah&key=YOUR_API_KEY" alt="Peta Lokasi" class="w-full h-full object-cover">
                </div>
                <p class="text-gray-600">
                    <svg class="w-5 h-5 inline-block mr-2 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                    </svg>
                    Jl. Tenun No. 123, Desa Wisata, Kec. Batang, Jawa Tengah
                </p>
            </div>

            <!-- Ulasan -->
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Ulasan</h3>
                <div class="flex items-center mb-4">
                    <div class="text-4xl font-bold text-gray-800 mr-4">4.8</div>
                    <div>
                        <div class="flex items-center mb-1">
                            <div class="flex">
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm">56 ulasan</p>
                    </div>
                </div>
                <button class="w-full py-2 border border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50 transition-colors duration-200">
                    Lihat Semua Ulasan
                </button>
            </div>
        </div> --}}

            <!-- Produk Lainnya Section -->
            <div class="mt-12">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Produk Lainnya dari UMKM Ini</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                    @if ($umkmTerkait->isNotEmpty())
                        @foreach ($umkmTerkait as $umkm)
                            <!-- Produk 1 -->
                            <div
                                class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                                <img src="{{ asset('storage/umkm_images/' . $umkm->gambar) }}" alt="Produk UMKM"
                                    class="w-full h-48 object-cover">
                                <div class="p-4">
                                    <h4 class="text-lg font-bold text-gray-800 mb-1">{{ $umkm->pemilik }}</h4>
                                    <p class="text-gray-600 text-sm mb-2">{{ $umkm->nama }}</p>
                                    <p class="text-gray-600 text-sm mb-2">{{ $umkm->deskripsi }}</p>
                                    <div class="flex justify-between items-center">
                                        {{-- <span class="font-bold text-gray-800">Rp 275.000</span> --}}
                                        <a href="{{ route('lp.umkm.show', $umkm->id) }}"
                                            class="text-blue-600 hover:text-blue-800 text-sm font-medium">Lihat →</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
