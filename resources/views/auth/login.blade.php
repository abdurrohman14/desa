<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Desa Maju Jaya</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
    <style>
        .bg-login {
            background: linear-gradient(rgba(0, 100, 0, 0.7), rgba(0, 100, 0, 0.7)),
                url("https://via.placeholder.com/1920x1080") no-repeat center center;
            background-size: cover;
        }
    </style>
</head>

<body class="font-sans bg-gray-50">
    <!-- Main Content -->
    <main class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            <!-- Login Card -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200">
                <!-- Header -->
                <div class="bg-white-700 text-red py-3 px-3 text-left">
                    <div class="flex items-center justify-center">
                        <!-- Logo -->
                        <img src="{{ asset('assets/images/logo-desa.png') }}" alt="Logo Desa" class="h-16 mr-4" />

                        <!-- Teks -->
                        <div>
                            <h1 class="text-2xl font-bold">Desa Bulusari</h1>
                            <p class="text-black-100 mt-1">Silakan masuk ke akun Anda</p>
                        </div>
                    </div>
                </div>
                <hr />

                <!-- Form Login -->
                <div class="p-6 mt-4">
                    <form accept="{{ route('login') }}" method="POST">
                        @csrf
                        <!-- Email Input -->
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </div>
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                    class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                                    placeholder="email@contoh.com" required />
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div class="mb-6">
                            <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <input type="password" id="password" name="password" value="{{ old('password') }}"
                                    class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                                    placeholder="••••••••" required />
                                <button type="button" class="absolute right-3 top-2 text-gray-400 hover:text-gray-500"
                                    id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="text-right mt-2">
                                <a href="#" class="text-sm text-red-600 hover:text-red-800">Lupa password?</a>
                            </div>
                        </div>

                        <!-- Login Button -->
                        <button type="submit"
                            class="w-full bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-colors">
                            Masuk
                        </button>
                    </form>

                    <!-- Register Link -->
                    <div class="mt-6 text-center">
                        <p class="text-gray-600 text-sm">
                            Belum memiliki akun?
                            <a href="{{ route('register') }}" class="text-red-600 font-medium hover:text-red-800">Daftar
                                sekarang</a>
                        </p>
                    </div>
                </div>
                <!-- Back to Home -->
                <div class="text-center mt-2 mb-4">
                    <a href="{{ url('/') }}" class="text-red-600 hover:text-red-800 text-sm font-medium">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali ke beranda
                    </a>
                </div>
            </div>
        </div>
    </main>
    <!-- Script untuk toggle password visibility -->
    <script>
        const togglePassword = document.getElementById("togglePassword");
        const password = document.getElementById("password");

        togglePassword.addEventListener("click", function() {
            const type =
                password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            this.innerHTML =
                type === "password" ?
                '<i class="fas fa-eye"></i>' :
                '<i class="fas fa-eye-slash"></i>';
        });
    </script>
</body>

</html>
