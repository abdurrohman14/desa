@extends('partials.lp.main')
@section('content')
    <div class="container mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Layanan Surat</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card 1: Pending -->
            <div class="bg-white shadow-lg rounded-2xl p-6 hover:shadow-xl transition duration-300">
                <i class="fa-solid fa-file-pdf"></i>
                <h2 class="text-xl font-semibold text-gray-700 mb-2">Surat Keterangan Tidak Mampu</h2>
                <p class="text-gray-600 mb-4">Untuk keperluan bantuan sosial dan administrasi lainnya.</p>
                <div class="mb-4">
                    <span
                        class="inline-block px-3 py-1 text-sm font-medium bg-yellow-100 text-yellow-800 rounded-full">Pending</span>
                </div>
                @auth
                    <a href="#" onclick="openAddLayanan()" class="text-blue-600 font-medium hover:underline">Ajukan
                        Surat</a>
                @else
                    <a href="javascript:void(0)" onclick="showLoginWarning()" class="text-blue-600 font-medium hover:underline">
                        Ajukan Surat
                    </a>
                @endauth
                <button class="bg-gray-300 text-gray-600 px-4 py-2 rounded-lg text-sm cursor-not-allowed" disabled>Belum
                    Tersedia</button>
            </div>

            <!-- Card 2: Diproses -->
            <div class="bg-white shadow-lg rounded-2xl p-6 hover:shadow-xl transition duration-300">
                <i class="fa-solid fa-file-pdf"></i>
                <h2 class="text-xl font-semibold text-gray-700 mb-2">Surat Kematian</h2>
                <p class="text-gray-600 mb-4">Diperlukan untuk pengurusan dokumen ahli waris dan lainnya.</p>
                <div class="mb-4">
                    <span
                        class="inline-block px-3 py-1 text-sm font-medium bg-blue-100 text-blue-800 rounded-full">Diproses</span>
                </div>
                <a href="#" class="text-blue-600 font-medium hover:underline">Ajukan Surat</a>
                <button class="bg-gray-300 text-gray-600 px-4 py-2 rounded-lg text-sm cursor-not-allowed" disabled>Belum
                    Tersedia</button>
            </div>

            <!-- Card 3: Selesai -->
            <div class="bg-white shadow-lg rounded-2xl p-6 hover:shadow-xl transition duration-300">
                <i class="fa-solid fa-file-pdf"></i>
                <h2 class="text-xl font-semibold text-gray-700 mb-2">Surat Domisili</h2>
                <p class="text-gray-600 mb-4">Digunakan untuk keterangan tempat tinggal seseorang.</p>
                <div class="mb-4">
                    <span
                        class="inline-block px-3 py-1 text-sm font-medium bg-green-100 text-green-800 rounded-full">Selesai</span>
                </div>
                <a href="#" class="text-blue-600 font-medium hover:underline">Ajukan Surat</a>
                <a href="#"
                    class="inline-block bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 transition">Download
                    Surat</a>
            </div>
        </div>
    </div>

    <div id="AddLayanan" class="hidden fixed inset-0 bg-black bg-opacity-50 z-40 flex items-center justify-center">
        <div class="bg-white w-full max-w-lg p-6 rounded-lg shadow-lg relative z-50 overflow-y-auto max-h-screen">
            <h2 class="text-xl font-semibold mb-4">Ajukan Surat Baru</h2>

            <form action="{{ route('warga.surat.store') }}" method="POST">
                @csrf

                <label for="tipe_surat_id" class="block font-medium mb-2">Jenis Surat</label>
                <select name="tipe_surat_id" id="tipe_surat_id"
                    class="w-full border rounded p-2 mb-4 @error('tipe_surat_id') border-red-500 @enderror">
                    <option value="">-- Pilih Jenis Surat --</option>
                    @foreach ($jenisSurat as $jenis)
                        <option value="{{ $jenis->id }}" {{ old('tipe_surat_id') == $jenis->id ? 'selected' : '' }}>
                            {{ $jenis->nama }}
                        </option>
                    @endforeach
                </select>
                @error('tipe_surat_id')
                    <p class="text-red-600 text-sm mb-4">{{ $message }}</p>
                @enderror

                <label for="data_pengajuan[keperluan]" class="block font-medium mb-2">Keperluan Surat</label>
                <input type="text" name="data_pengajuan[keperluan]" id="data_pengajuan[keperluan]"
                    class="w-full border rounded p-2 mb-4 @error('data_pengajuan.keperluan') border-red-500 @enderror"
                    value="{{ old('data_pengajuan.keperluan') }}">
                @error('data_pengajuan.keperluan')
                    <p class="text-red-600 text-sm mb-4">{{ $message }}</p>
                @enderror

                <label for="data_pengajuan[alamat]" class="block font-medium mb-2">Alamat</label>
                <textarea name="data_pengajuan[alamat]" id="data_pengajuan[alamat]" rows="3"
                    class="w-full border rounded p-2 mb-4 @error('data_pengajuan.alamat') border-red-500 @enderror">{{ old('data_pengajuan.alamat') }}</textarea>
                @error('data_pengajuan.alamat')
                    <p class="text-red-600 text-sm mb-4">{{ $message }}</p>
                @enderror

                <div class="flex justify-end gap-2">
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                        Kirim Pengajuan
                    </button>
                    <button type="button" onclick="closeAddLayanan()"
                        class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openAddLayanan() {
            document.getElementById('AddLayanan').classList.remove('hidden');
        }

        function closeAddLayanan() {
            document.getElementById('AddLayanan').classList.add('hidden');
        }
    </script>
@endsection
