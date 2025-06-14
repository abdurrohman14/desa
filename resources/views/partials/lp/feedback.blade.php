<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl md:text-3xl font-bold text-center mb-8 text-red-700">
            Kritik dan Saran
        </h2>

        {{-- Notifikasi sukses --}}
        @if (session('success'))
            <div class="mb-6 text-green-700 bg-green-100 border border-green-300 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- Notifikasi error validasi --}}
        @if ($errors->any())
            <div class="mb-6 text-red-700 bg-red-100 border border-red-300 px-4 py-3 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="w-full p-6">
                <form action="{{ route('lp.feedback') }}" method="POST" class="space-y-4">
                    @csrf

                    {{-- Nama --}}
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                            class="mt-1 p-2 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Tulis nama Anda (opsional)">
                    </div>

                    {{-- Email --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="mt-1 p-2 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            placeholder="contoh@email.com (opsional)">
                    </div>

                    {{-- Pesan --}}
                    <div>
                        <label for="pesan" class="block text-sm font-medium text-gray-700">
                            Kritik / Saran <span class="text-red-500">*</span>
                        </label>
                        <textarea name="pesan" id="pesan" rows="5" required
                            class="mt-1 p-2 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Tulis kritik atau saran Anda di sini...">{{ old('pesan') }}</textarea>
                    </div>

                    {{-- Tombol Kirim --}}
                    <div class="flex justify-end">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 transition-colors">
                            Kirim
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
