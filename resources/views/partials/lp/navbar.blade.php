<nav class="bg-red-700 text-white shadow-md">
    <div class="container mx-auto px-4 py-3">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('assets/images/logo-desa.png') }}" alt="Logo Desa" class="h-10" />
                <span class="font-bold text-lg">Desa Bulusari</span>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" class="text-white focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ url('/') }}" class="hover:text-red-200 font-medium">Beranda</a>
                <a href="/profile-desa" class="hover:text-red-200 font-medium">Profil</a>
                <a href="{{ route('lp.berita.index') }}" class="hover:text-red-200 font-medium">Berita</a>
                <a href="{{ route('lp.umkm.index') }}" class="hover:text-red-200 font-medium">UMKM</a>
                <a href="#" class="hover:text-red-200 font-medium">Pemerintahan</a>
                <a href="{{ route('lp.layanan') }}" class="hover:text-red-200 font-medium">Layanan</a>
                <a href="{{ route('lp.galeri') }}" class="hover:text-red-200 font-medium">Galeri</a>
                <!-- Bagian Autentikasi -->
                @auth
                    <div class="relative ml-4">
                        <button id="user-menu" class="flex items-center space-x-2 focus:outline-none">
                            <img src="{{ Auth::user()->foto ? asset('storage/profiles/' . Auth::user()->foto) : (Auth::user()->role === 'admin' ? asset('assets/images/kepala-desa.jpg') : asset('assets/images/kepala-desa.jpg')) }}"
                                alt="Foto Profil" class="h-8 w-8 rounded-full object-cover" />
                            <span class="font-medium">{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down text-sm"></i>
                        </button>
                        <div id="dropdown-user"
                            class="absolute right-0 mt-2 w-40 bg-white text-black rounded shadow-md hidden z-50">
                            <a href="{{ route('warga.profile') }}" class="block px-4 py-2 hover:bg-gray-100">Profil</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="flex space-x-3 ml-4">
                        <a href="{{ route('login') }}"
                            class="px-3 py-1 bg-white text-red-700 rounded hover:bg-gray-100">Masuk</a>
                        <a href="{{ route('register') }}"
                            class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-500">Daftar</a>
                    </div>
                @endauth
            </div>
        </div>

        <!-- Mobile Menu (hidden by default) -->
        <div id="mobile-menu" class="hidden md:hidden mt-2 pb-2">
            <a href="{{ url('/') }}" class="block py-2 hover:bg-red-600 px-2 rounded">Beranda</a>
            <a href="/profile-desa }}" class="block py-2 hover:bg-red-600 px-2 rounded">Profil</a>
            <a href="{{ route('lp.berita.index') }}" class="block py-2 hover:bg-red-600 px-2 rounded">Berita</a>
            <a href="{{ route('lp.umkm.index') }}" class="block py-2 hover:bg-red-600 px-2 rounded">UMKM</a>
            <a href="#" class="block py-2 hover:bg-red-600 px-2 rounded">Pemerintahan</a>
            <a href="{{ route('lp.layanan') }}" class="block py-2 hover:bg-red-600 px-2 rounded">Layanan</a>
            @auth
                <div class="mt-2">
                    <div class="flex items-center space-x-2 px-2 py-2">
                        <img src="{{ Auth::user()->foto ? asset('storage/profiles/' . Auth::user()->foto) : (Auth::user()->role === 'admin' ? asset('assets/images/kepala-desa.jpg') : asset('assets/images/kepala-desa.jpg')) }}"
                            class="h-8 w-8 rounded-full object-cover" />
                        <span class="font-medium">{{ Auth::user()->name }}</span>
                    </div>
                    <a href="" class="block py-2 px-2 hover:bg-red-600 rounded">Profil</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full text-left block py-2 px-2 hover:bg-red-600 rounded">Logout</button>
                    </form>
                </div>
            @else
                <div class="flex space-x-3 mt-2">
                    <a href="{{ route('login') }}"
                        class="w-1/2 text-center px-3 py-1 bg-white text-red-700 rounded hover:bg-gray-100">Masuk</a>
                    <a href="{{ route('register') }}"
                        class="w-1/2 text-center px-3 py-1 bg-red-600 text-white rounded hover:bg-red-500">Daftar</a>
                </div>
            @endauth
        </div>
    </div>
</nav>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const userMenu = document.getElementById("user-menu");
        const dropdown = document.getElementById("dropdown-user");

        if (userMenu) {
            userMenu.addEventListener("click", function() {
                dropdown.classList.toggle("hidden");
            });

            // Optional: click outside to close
            document.addEventListener("click", function(e) {
                if (!userMenu.contains(e.target) && !dropdown.contains(e.target)) {
                    dropdown.classList.add("hidden");
                }
            });
        }
    });
</script>
