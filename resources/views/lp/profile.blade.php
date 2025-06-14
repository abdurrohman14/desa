@extends('partials.lp.main')
@section('content')
    <div class="relative bg-red-700 h-64 flex items-center justify-center">
        <div class="absolute inset-0 bg-black opacity-40"></div>
        <div class="relative z-10 text-center px-4">
            <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">Profil Desa Bulusari</h1>
            <div class="flex justify-center">
                <nav class="flex space-x-2 text-sm text-white">
                    <a href="#" class="hover:text-green-200">Beranda</a>
                    <span>/</span>
                    <a href="#" class="text-green-300 font-medium">Profil Desa</a>
                </nav>
            </div>
        </div>
    </div>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar Menu -->
            <div class="lg:w-1/4">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-24">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Menu Profil</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="#informasi" class="flex items-center text-green-600 font-medium">
                                <i class="fas fa-info-circle mr-2"></i> Informasi Desa
                            </a>
                        </li>
                        <li>
                            <a href="#sejarah" class="flex items-center text-gray-700 hover:text-green-600">
                                <i class="fas fa-landmark mr-2"></i> Sejarah Desa
                            </a>
                        </li>
                        <li>
                            <a href="#visi-misi" class="flex items-center text-gray-700 hover:text-green-600">
                                <i class="fas fa-bullseye mr-2"></i> Visi & Misi
                            </a>
                        </li>
                        <li>
                            <a href="#struktur" class="flex items-center text-gray-700 hover:text-green-600">
                                <i class="fas fa-sitemap mr-2"></i> Struktur Organisasi
                            </a>
                        </li>
                        <li>
                            <a href="#demografi" class="flex items-center text-gray-700 hover:text-green-600">
                                <i class="fas fa-chart-bar mr-2"></i> Data Demografi
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Content Area -->
            <div class="lg:w-3/4">
                <!-- Informasi Desa Section -->
                <section id="informasi" class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <div class="flex items-center mb-6">
                        <div class="bg-green-100 p-3 rounded-full mr-4">
                            <i class="fas fa-info-circle text-green-600 text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Informasi Desa</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="border border-gray-200 rounded-lg p-4">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center">
                                <i class="fas fa-map-marker-alt text-green-600 mr-2"></i> Lokasi Desa
                            </h3>
                            <div class="aspect-w-16 aspect-h-9 mb-4">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7899.033737140179!2d114.29077852570013!3d-8.150564049368779!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd14ff51dfb1b05%3A0x2080ee8d66e62699!2sKantor%20Desa%20Bulusari!5e0!3m2!1sid!2sid!4v1747654000330!5m2!1sid!2sid"
                                    class="w-full h-48 rounded-lg border-0" allowfullscreen="" loading="lazy">
                                </iframe>
                            </div>
                            <p class="text-gray-600">
                                Dusun Krajan, Bulusari, Kec. Kalipuro, Kab. Banyuwangi, Jawa Timur 68455
                            </p>
                        </div>

                        <div class="border border-gray-200 rounded-lg p-4">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center">
                                <i class="fas fa-chart-pie text-green-600 mr-2"></i> Data Pokok
                            </h3>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex justify-between">
                                    <span class="font-medium">Luas Wilayah</span>
                                    <span>250 Ha</span>
                                </li>
                                <li class="flex justify-between">
                                    <span class="font-medium">Jumlah Penduduk</span>
                                    <span>3.245 Jiwa</span>
                                </li>
                                <li class="flex justify-between">
                                    <span class="font-medium">Jumlah KK</span>
                                    <span>892 KK</span>
                                </li>
                                <li class="flex justify-between">
                                    <span class="font-medium">Kode Pos</span>
                                    <span>68455</span>
                                </li>
                                <li class="flex justify-between">
                                    <span class="font-medium">Kecamatan</span>
                                    <span>Kalipuro</span>
                                </li>
                                <li class="flex justify-between">
                                    <span class="font-medium">Kabupaten</span>
                                    <span>Banyuwangi</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-6 border border-gray-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center">
                            <i class="fas fa-info-circle text-green-600 mr-2"></i> Deskripsi Desa
                        </h3>
                        <p class="text-gray-600 mb-4">
                            Desa Bulusari merupakan salah satu desa di Kecamatan Kalipuro, Kabupaten Banyuwangi yang
                            memiliki potensi besar di bidang pertanian dan pariwisata. Dengan hamparan sawah yang luas dan
                            pemandangan Gunung Ijen yang memukau, desa ini menjadi salah satu tujuan wisata alam di
                            Banyuwangi.
                        </p>
                        <p class="text-gray-600">
                            Masyarakat Desa Bulusari dikenal dengan keramahannya dan semangat gotong royong yang tinggi.
                            Mayoritas penduduk bekerja sebagai petani, dengan komoditas utama berupa padi, jagung, dan
                            berbagai jenis sayuran.
                        </p>
                    </div>
                </section>

                <!-- Sejarah Desa Section -->
                <section id="sejarah" class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <div class="flex items-center mb-6">
                        <div class="bg-green-100 p-3 rounded-full mr-4">
                            <i class="fas fa-landmark text-green-600 text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Sejarah Desa Bulusari</h2>
                    </div>

                    <div class="flex flex-col md:flex-row gap-6 mb-6">
                        <div class="md:w-1/3">
                            <img src="{{ asset('assets/images/desa-bulusari.jpeg') }}" alt="Sejarah Desa"
                                class="w-full rounded-lg shadow-md">
                        </div>
                        <div class="md:w-2/3">
                            <p class="text-gray-600 mb-4">
                                Desa Bulusari berdiri pada tahun 1825 dengan nama awal "Dukuh Bulu". Nama ini berasal dari
                                pohon bulu (sejenis bambu) yang banyak tumbuh di wilayah ini. Menurut cerita turun-temurun,
                                daerah ini awalnya merupakan hutan belantara yang dibuka oleh sekelompok pendatang dari
                                Mataram.
                            </p>
                            <p class="text-gray-600 mb-4">
                                Pada tahun 1850, nama desa diubah menjadi "Bulusari" yang berarti "Bulu yang membawa
                                kebaikan". Perubahan nama ini terjadi setelah seorang tokoh spiritual bernama Mbah Kerto
                                menetap di desa ini dan membawa kemajuan bagi masyarakat setempat.
                            </p>
                        </div>
                    </div>

                    {{-- <div class="border-l-4 border-green-500 pl-4 mb-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Perkembangan Desa</h3>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-start">
                                <span
                                    class="bg-green-500 text-white rounded-full w-5 h-5 flex items-center justify-center mr-2 mt-0.5 flex-shrink-0">1</span>
                                <span>Tahun 1901 - Pembangunan Balai Desa pertama</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="bg-green-500 text-white rounded-full w-5 h-5 flex items-center justify-center mr-2 mt-0.5 flex-shrink-0">2</span>
                                <span>Tahun 1945 - Desa Bulusari menjadi basis perjuangan arek-arek Suroboyo</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="bg-green-500 text-white rounded-full w-5 h-5 flex items-center justify-center mr-2 mt-0.5 flex-shrink-0">3</span>
                                <span>Tahun 1975 - Pembangunan irigasi pertama untuk mendukung pertanian</span>
                            </li>
                            <li class="flex items-start">
                                <span
                                    class="bg-green-500 text-white rounded-full w-5 h-5 flex items-center justify-center mr-2 mt-0.5 flex-shrink-0">4</span>
                                <span>Tahun 2005 - Penetapan sebagai Desa Wisata oleh Pemerintah Kabupaten</span>
                            </li>
                        </ul>
                    </div> --}}

                    <div class="bg-green-50 rounded-lg p-4 border border-green-100">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2 flex items-center">
                            <i class="fas fa-lightbulb text-green-600 mr-2"></i> Makna Lambang Desa
                        </h3>
                        <div class="flex flex-col md:flex-row gap-4">
                            <div class="md:w-1/4 flex justify-center">
                                <img src="{{ asset('assets/images/logo-desa.png') }}" alt="Lambang Desa" class="w-32 h-32 object-contain">
                            </div>
                            <div class="md:w-3/4">
                                <p class="text-gray-600">
                                    Lambang Desa Bulusari terdiri dari gambar padi dan kapas yang melambangkan kemakmuran,
                                    gunung yang melambangkan kekayaan alam, dan sungai yang melambangkan kehidupan. Warna
                                    hijau dominan melambangkan kesuburan dan kemakmuran, sedangkan warna kuning melambangkan
                                    kesejahteraan masyarakat.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Visi & Misi Section -->
                <section id="visi-misi" class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <div class="flex items-center mb-6">
                        <div class="bg-green-100 p-3 rounded-full mr-4">
                            <i class="fas fa-bullseye text-green-600 text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Visi & Misi Desa Bulusari</h2>
                    </div>

                    <div class="mb-8">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                            <span
                                class="bg-green-600 text-white rounded-full w-8 h-8 flex items-center justify-center mr-3">V</span>
                            Visi Desa
                        </h3>
                        <div class="bg-green-50 rounded-lg p-6 border-l-4 border-green-600">
                            <p class="text-lg font-medium text-gray-800 italic">
                                "Terwujudnya Desa Bulusari yang Maju, Mandiri, dan Berbudaya Berbasis Potensi Lokal"
                            </p>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                            <span
                                class="bg-green-600 text-white rounded-full w-8 h-8 flex items-center justify-center mr-3">M</span>
                            Misi Desa
                        </h3>
                        <div class="space-y-4">
                            <div class="flex items-start bg-green-50 rounded-lg p-4">
                                <span
                                    class="bg-green-600 text-white rounded-full w-6 h-6 flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">1</span>
                                <p class="text-gray-700">
                                    Meningkatkan pembangunan infrastruktur desa yang berkelanjutan untuk mendukung
                                    perekonomian masyarakat
                                </p>
                            </div>
                            <div class="flex items-start bg-green-50 rounded-lg p-4">
                                <span
                                    class="bg-green-600 text-white rounded-full w-6 h-6 flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">2</span>
                                <p class="text-gray-700">
                                    Mengembangkan potensi pertanian dan pariwisata sebagai sumber pendapatan utama
                                    masyarakat
                                </p>
                            </div>
                            <div class="flex items-start bg-green-50 rounded-lg p-4">
                                <span
                                    class="bg-green-600 text-white rounded-full w-6 h-6 flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">3</span>
                                <p class="text-gray-700">
                                    Meningkatkan kualitas sumber daya manusia melalui pendidikan dan pelatihan keterampilan
                                </p>
                            </div>
                            <div class="flex items-start bg-green-50 rounded-lg p-4">
                                <span
                                    class="bg-green-600 text-white rounded-full w-6 h-6 flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">4</span>
                                <p class="text-gray-700">
                                    Memperkuat nilai-nilai budaya dan kearifan lokal sebagai identitas masyarakat Desa
                                    Bulusari
                                </p>
                            </div>
                            <div class="flex items-start bg-green-50 rounded-lg p-4">
                                <span
                                    class="bg-green-600 text-white rounded-full w-6 h-6 flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">5</span>
                                <p class="text-gray-700">
                                    Mewujudkan tata kelola pemerintahan desa yang transparan, akuntabel, dan partisipatif
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Struktur Organisasi Section -->
                {{-- <section id="struktur" class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <div class="flex items-center mb-6">
                        <div class="bg-green-100 p-3 rounded-full mr-4">
                            <i class="fas fa-sitemap text-green-600 text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Struktur Organisasi Desa Bulusari</h2>
                    </div>

                    <div class="mb-6">
                        <p class="text-gray-600 mb-6">
                            Berikut adalah struktur organisasi Pemerintah Desa Bulusari periode 2023-2028 berdasarkan
                            Peraturan Desa Nomor 05 Tahun 2023 tentang Susunan Organisasi dan Tata Kerja Pemerintah Desa
                            Bulusari.
                        </p>

                        <!-- Organizational Chart -->
                        <div class="org-chart">
                            <!-- Level 1 - Kepala Desa -->
                            <div class="org-level">
                                <div class="org-node">
                                    <h4>Kepala Desa</h4>
                                    <p>Drs. H. Ahmad Fauzi</p>
                                    <p class="text-xs text-gray-500">2023-2028</p>
                                </div>
                            </div>

                            <div class="org-lines">
                                <div class="org-line"></div>
                            </div>

                            <!-- Level 2 - Sekretaris dan Pelaksana -->
                            <div class="org-level">
                                <div class="org-node">
                                    <h4>Sekretaris Desa</h4>
                                    <p>Bambang Sutrisno, S.Sos</p>
                                </div>

                                <div class="org-node">
                                    <h4>Pelaksana Teknis</h4>
                                    <p>3 Bidang</p>
                                </div>

                                <div class="org-node">
                                    <h4>Kepala Urusan</h4>
                                    <p>5 Urusan</p>
                                </div>
                            </div>

                            <div class="org-lines">
                                <div class="org-line"></div>
                                <div class="org-line-horizontal"></div>
                            </div>

                            <!-- Level 3 - Detail -->
                            <div class="org-level">
                                <!-- Pelaksana Teknis -->
                                <div class="flex flex-col">
                                    <div class="org-node mb-2">
                                        <h4>Bidang Pemerintahan</h4>
                                        <p>Siti Aminah, S.IP</p>
                                    </div>
                                    <div class="org-node mb-2">
                                        <h4>Bidang Pembangunan</h4>
                                        <p>Joko Susilo, ST</p>
                                    </div>
                                    <div class="org-node">
                                        <h4>Bidang Kemasyarakatan</h4>
                                        <p>Dewi Kartika, S.Sos</p>
                                    </div>
                                </div>

                                <!-- Kepala Urusan -->
                                <div class="flex flex-col">
                                    <div class="org-node mb-2">
                                        <h4>Urusan Umum</h4>
                                        <p>Rudi Hartono</p>
                                    </div>
                                    <div class="org-node mb-2">
                                        <h4>Urusan Keuangan</h4>
                                        <p>Linda Wulandari, SE</p>
                                    </div>
                                    <div class="org-node mb-2">
                                        <h4>Urusan Perencanaan</h4>
                                        <p>Agus Priyanto</p>
                                    </div>
                                    <div class="org-node mb-2">
                                        <h4>Urusan Kesejahteraan</h4>
                                        <p>Nurhayati</p>
                                    </div>
                                    <div class="org-node">
                                        <h4>Urusan Pelayanan</h4>
                                        <p>Rina Marliana</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Badan Permusyawaratan Desa (BPD)</h3>
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white border border-gray-200">
                                <thead class="bg-green-600 text-white">
                                    <tr>
                                        <th class="py-2 px-4 border-b">No</th>
                                        <th class="py-2 px-4 border-b">Nama</th>
                                        <th class="py-2 px-4 border-b">Jabatan</th>
                                        <th class="py-2 px-4 border-b">Alamat</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700">
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-2 px-4 border-b text-center">1</td>
                                        <td class="py-2 px-4 border-b">Drs. H. Muhammad Yasin</td>
                                        <td class="py-2 px-4 border-b">Ketua</td>
                                        <td class="py-2 px-4 border-b">Dusun Krajan</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-2 px-4 border-b text-center">2</td>
                                        <td class="py-2 px-4 border-b">Sutrisno, S.Pd</td>
                                        <td class="py-2 px-4 border-b">Wakil Ketua</td>
                                        <td class="py-2 px-4 border-b">Dusun Krajan</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-2 px-4 border-b text-center">3</td>
                                        <td class="py-2 px-4 border-b">Sri Wahyuni</td>
                                        <td class="py-2 px-4 border-b">Sekretaris</td>
                                        <td class="py-2 px-4 border-b">Dusun Krajan</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-2 px-4 border-b text-center">4</td>
                                        <td class="py-2 px-4 border-b">Bambang Setiawan</td>
                                        <td class="py-2 px-4 border-b">Anggota</td>
                                        <td class="py-2 px-4 border-b">Dusun Krajan</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-2 px-4 border-b text-center">5</td>
                                        <td class="py-2 px-4 border-b">Dewi Sartika</td>
                                        <td class="py-2 px-4 border-b">Anggota</td>
                                        <td class="py-2 px-4 border-b">Dusun Krajan</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section> --}}

                <!-- Data Demografi Section -->
                <section id="demografi" class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center mb-6">
                        <div class="bg-green-100 p-3 rounded-full mr-4">
                            <i class="fas fa-chart-bar text-green-600 text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Data Demografi Desa Bulusari</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="border border-gray-200 rounded-lg p-4">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                <i class="fas fa-users text-green-600 mr-2"></i> Jumlah Penduduk
                            </h3>
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-gray-600">Total Penduduk</span>
                                <span class="font-medium">3.245 Jiwa</span>
                            </div>
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-gray-600">Laki-laki</span>
                                <span class="font-medium">1.620 Jiwa</span>
                            </div>
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-gray-600">Perempuan</span>
                                <span class="font-medium">1.625 Jiwa</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Kepala Keluarga</span>
                                <span class="font-medium">892 KK</span>
                            </div>
                        </div>

                        <div class="border border-gray-200 rounded-lg p-4">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                <i class="fas fa-map-marked-alt text-green-600 mr-2"></i> Wilayah Administratif
                            </h3>
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-gray-600">Dusun</span>
                                <span class="font-medium">3 Dusun</span>
                            </div>
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-gray-600">RW</span>
                                <span class="font-medium">8 RW</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">RT</span>
                                <span class="font-medium">24 RT</span>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Grafik Penduduk Berdasarkan Usia</h3>
                        <div class="bg-gray-100 rounded-lg p-4 h-64 flex items-center justify-center">
                            <p class="text-gray-500">[Visualisasi Grafik Usia Penduduk]</p>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Grafik Penduduk Berdasarkan Pendidikan</h3>
                        <div class="bg-gray-100 rounded-lg p-4 h-64 flex items-center justify-center">
                            <p class="text-gray-500">[Visualisasi Grafik Pendidikan Penduduk]</p>
                        </div>
                    </div> --}}
                </section>
            </div>
        </div>
    </div>
@endsection
