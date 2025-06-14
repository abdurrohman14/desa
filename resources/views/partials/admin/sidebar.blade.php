@auth
    @php
        $user = auth()->user();
    @endphp
@endauth

<div id="sidebar"
    class="bg-blue-800 overflow-y-auto text-white w-64 h-full fixed inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out z-10 flex flex-col">
    <!-- Brand Logo -->
    <div class="flex items-center space-x-2 px-4 py-5">
        <img src="{{ asset('assets/images/logo-desa.png') }}" alt="logo desa" class="h-10 w-10" />
        <span class="text-lg font-extrabold">Desa Bulusari</span>
    </div>

    <!-- Navigation -->
    <nav class="flex-1">
        <ul class="space-y-1 px-2">
            @if ($user->role === App\Models\User::ROLE_ADMIN)
                <!-- Dashboard -->
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center space-x-2 px-3 py-2 text-sm text-white bg-blue-900 rounded-lg">
                        <i class="fas fa-tachometer-alt w-5 text-center"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Data Master -->
                <li class="px-3 pt-4 pb-1">
                    <span class="text-blue-300 text-xs font-semibold uppercase tracking-wider">Data Master</span>
                </li>
                <li>
                    <a href="{{ route('kategori.index') }}"
                        class="flex items-center space-x-2 px-3 py-2 text-sm text-white hover:bg-blue-900 rounded-lg transition duration-200">
                        <i class="fa-solid fa-folder w-5 text-center"></i>
                        <span>Kategori</span>
                    </a>
                </li>

                <!-- Informasi Desa -->
                <li class="px-3 pt-4 pb-1">
                    <span class="text-blue-300 text-xs font-semibold uppercase tracking-wider">Informasi Desa</span>
                </li>
                <li>
                    <a href="{{ route('admin.berita.index') }}"
                        class="flex items-center space-x-2 px-3 py-2 text-sm text-white hover:bg-blue-900 rounded-lg transition duration-200">
                        <i class="fas fa-newspaper w-5 text-center"></i>
                        <span>Berita</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.umkm.index') }}"
                        class="flex items-center space-x-2 px-3 py-2 text-sm text-white hover:bg-blue-900 rounded-lg transition duration-200">
                        <i class="fas fa-store w-5 text-center"></i>
                        <span>UMKM</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.galeri.index') }}"
                        class="flex items-center space-x-2 px-3 py-2 text-sm text-white hover:bg-blue-900 rounded-lg transition duration-200">
                        <i class="fa-solid fa-image w-5 text-center"></i>
                        <span>Galeri</span>
                    </a>
                </li>

                <!-- Kependudukan -->
                <li class="px-3 pt-4 pb-1">
                    <span class="text-blue-300 text-xs font-semibold uppercase tracking-wider">Kependudukan</span>
                </li>
                <li>
                    <a href="{{ route('admin.penduduk.index') }}"
                        class="flex items-center space-x-2 px-3 py-2 text-sm text-white hover:bg-blue-900 rounded-lg transition duration-200">
                        <i class="fas fa-users w-5 text-center"></i>
                        <span>Data Penduduk</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.keluarga.index') }}"
                        class="flex items-center space-x-2 px-3 py-2 text-sm text-white hover:bg-blue-900 rounded-lg transition duration-200">
                        <i class="fas fa-home w-5 text-center"></i>
                        <span>Data Keluarga</span>
                    </a>
                </li>

                <!-- Surat Menyurat -->
                <li class="px-3 pt-4 pb-1">
                    <span class="text-blue-300 text-xs font-semibold uppercase tracking-wider">Surat</span>
                </li>
                <li>
                    <a href="{{ route('admin.surat.index') }}"
                        class="flex items-center space-x-2 px-3 py-2 text-sm text-white hover:bg-blue-900 rounded-lg transition duration-200">
                        <i class="fa-solid fa-file text-center"></i>
                        <span>Surat Menyurat</span>
                    </a>
                </li>

                <!-- Kritik & Sarana -->
                <li class="px-3 pt-4 pb-1">
                    <span class="text-blue-300 text-xs font-semibold uppercase tracking-wider">Kritik & Saran</span>
                </li>
                <li>
                    <a href="{{ route('admin.feedback.index') }}"
                        class="flex items-center space-x-2 px-3 py-2 text-sm text-white hover:bg-blue-900 rounded-lg transition duration-200">
                        <i class="fa-solid fa-comment text-center"></i>
                        <span>Kritik & Saran</span>
                    </a>
                </li>

                <!-- Laporan & Analitik -->
                <li class="px-3 pt-4 pb-1">
                    <span class="text-blue-300 text-xs font-semibold uppercase tracking-wider">Laporan</span>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center space-x-2 px-3 py-2 text-sm text-white hover:bg-blue-900 rounded-lg transition duration-200">
                        <i class="fas fa-chart-bar w-5 text-center"></i>
                        <span>Analytics</span>
                    </a>
                </li>
        </ul>
    @elseif($user->role === App\Models\User::ROLE_WARGA)
        <li>
            <a href="{{ route('warga.dashboard') }}"
                class="flex items-center space-x-2 px-3 py-2 text-sm text-white bg-blue-900 rounded-lg">
                <i class="fas fa-tachometer-alt w-5 text-center"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Kependudukan -->
        <li class="px-3 pt-4 pb-1">
            <span class="text-blue-300 text-xs font-semibold uppercase tracking-wider">Kependudukan</span>
        </li>
        <li>
            <a href="#"
                class="flex items-center space-x-2 px-3 py-2 text-sm text-white hover:bg-blue-900 rounded-lg transition duration-200">
                <i class="fas fa-home w-5 text-center"></i>
                <span>Data Keluarga</span>
            </a>
        </li>

        <!-- Surat Menyurat -->
        <li class="px-3 pt-4 pb-1">
            <span class="text-blue-300 text-xs font-semibold uppercase tracking-wider">Surat</span>
        </li>
        <li>
            <a href="{{ route('warga.surat.index') }}"
                class="flex items-center space-x-2 px-3 py-2 text-sm text-white hover:bg-blue-900 rounded-lg transition duration-200">
                <i class="fa-solid fa-file text-center"></i>
                <span>Surat Menyurat</span>
            </a>
        </li>
        @endif
    </nav>
</div>
