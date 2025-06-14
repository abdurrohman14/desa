<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
            <div class="bg-red-50 p-6 rounded-lg shadow-sm">
                <div class="text-red-600 text-3xl font-bold mb-2">{{ $penduduk }}</div>
                <div class="text-gray-600">Total Penduduk</div>
            </div>
            <div class="bg-red-50 p-6 rounded-lg shadow-sm">
                <div class="text-red-600 text-3xl font-bold mb-2">{{ $beritas->count() }}</div>
                <div class="text-gray-600">Berita</div>
            </div>
            <div class="bg-red-50 p-6 rounded-lg shadow-sm">
                <div class="text-red-600 text-3xl font-bold mb-2">{{ $umkms->count() }}</div>
                <div class="text-gray-600">UMKM</div>
            </div>
            <div class="bg-red-50 p-6 rounded-lg shadow-sm">
                <div class="text-red-600 text-3xl font-bold mb-2">12</div>
                <div class="text-gray-600">Layanan</div>
            </div>
        </div>
    </div>
</section>
