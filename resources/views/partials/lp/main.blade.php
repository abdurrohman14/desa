<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
</head>

<body class="font-sans bg-gray-50">
    <!-- Navbar -->
    @include('partials.lp.navbar')

    @if (Request::is('/'))
        <!-- Hero Section -->
        @include('partials.lp.hero')

        <!-- Data Section -->
        @include('partials.lp.statistik')

        <!-- Sambutan Kepala Desa -->
        @include('partials.lp.sambutan')

        <!-- Berita Section -->
        @include('partials.lp.berita')

        <!-- UMKM Section -->
        @include('partials.lp.umkm')

        <!-- Perangkat Desa -->
        @include('partials.lp.perangkat')

        <!-- Lokasi -->
        @include('partials.lp.lokasi')

        <!-- Kritik dan Saran -->
        @include('partials.lp.feedback')
    @endif

    @yield('content')

    <!-- Footer -->
    @include('partials.lp.footer')

    <!-- Script untuk mobile menu -->
    <script>
        const mobileMenuButton = document.getElementById("mobile-menu-button");
        const mobileMenu = document.getElementById("mobile-menu");

        mobileMenuButton.addEventListener("click", () => {
            mobileMenu.classList.toggle("hidden");
        });

        // fungsi pada layanan
        function showLoginWarning() {
            Swal.fire({
                title: 'Silakan Login',
                text: 'Anda harus login terlebih dahulu untuk mengajukan surat. Jika belum memiliki akun, silakan daftar.',
                icon: 'warning',
                confirmButtonText: 'Mengerti'
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
