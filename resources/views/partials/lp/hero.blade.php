<section class="relative">
    <div class="relative w-full h-[100vh] md:h-screen overflow-hidden">
        <div class="relative h-full w-full">
            <div class="absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out">
                <img src="{{ asset('assets/images/desa-bulusari.jpeg') }}" alt="Hero 1" class="w-full h-full object-cover" />
                <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center px-6 md:px-10 py-10 md:py-0">
                    <div class="w-full text-white space-y-4">
                        <h1 class="text-3xl md:text-5xl font-extrabold leading-tight">
                            Desa Bulusari
                        </h1>
                        <p class="text-sm md:text-lg">
                            Kecamatan Kalipuro, Kabupaten Banyuwangi, Jawa Timur 68455
                        </p>
                        <div class="flex flex-col sm:flex-row gap-3 mt-4">
                            <a href="/profile-desa" class="bg-white text-gray-800 px-4 py-2 rounded-md font-semibold">
                                Profil Desa
                            </a>
                            <a href="{{ route('lp.layanan') }}" class="bg-red-600 text-white px-4 py-2 rounded-md font-semibold">
                                Layanan
                            </a>
                            {{-- <button class="bg-red-600 text-white px-4 py-2 rounded-md font-semibold">
                                Layanan Desa
                            </button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



