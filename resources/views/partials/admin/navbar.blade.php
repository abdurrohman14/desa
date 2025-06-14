<header class="bg-white shadow-sm z-10">
    <div class="flex items-center justify-between px-4 py-3">
        <!-- Hamburger Button (Mobile) -->
        <button id="sidebarToggle" class="md:hidden text-gray-500 focus:outline-none">
            <i class="fas fa-bars text-xl"></i>
        </button>

        <!-- Search Bar -->
        <div class="relative mx-4 hidden md:block">
            <input type="text" placeholder="Search..."
                class="pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
        </div>

        <!-- User Profile -->
        <div class="flex items-center space-x-4">
            <!-- <div class="relative">
                            <i class="fas fa-bell text-xl text-gray-500"></i>
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
                        </div> -->
            <div class="relative">
                <button id="userMenuButton" class="flex items-center space-x-2 focus:outline-none">

                    <img src="{{ Auth::user()->foto ? asset('storage/profiles/' . Auth::user()->foto) : (Auth::user()->role === 'admin' ? asset('assets/images/default-admin.jpg') : asset('assets/images/default-warga.jpg')) }}"
                        alt="Admin Profile" class="rounded-full h-8 w-8">

                    <span class="hidden md:inline">{{ Auth::user()->name }}</span>
                    <i class="fas fa-chevron-down hidden md:inline text-gray-500"></i>
                </button>

                <!-- Dropdown Menu (Hidden by default) -->
                <div id="userDropdown"
                    class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20">
                    <a href="{{ auth()->user()->is_admin ? route('admin.profile') : route('warga.profile') }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                    <!-- <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Notifications</a> -->
                    <div class="border-t border-gray-200"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Log
                            Out</button>
                    </form>
                </div>
            </div>
        </div>
</header>
