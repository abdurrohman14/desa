@extends('partials.admin.main')
@section('content')
    <div class="flex-1 p-6 overflow-auto max-h-[calc(100vh-150px)]">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Edit Berita</h2>
        <div class="bg-white shadow-md rounded-lg p-6 ">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-green-500 cursor-pointer" role="button"
                            onclick="this.parentElement.parentElement.remove()" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500 cursor-pointer" role="button"
                            onclick="this.parentElement.parentElement.remove()" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
            @endif

            <form action="{{ route('admin.berita.update', ['id' => $berita->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Dropdown Kategori -->
                <div class="mb-4">
                    <label for="kategori_id" class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
                    <select id="kategori_id" name="kategori_id"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}"
                                {{ old('kategori_id', $berita->kategori_id ?? '') == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Input Judul -->
                <div class="mb-4">
                    <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Judul Berita</label>
                    <input type="text" id="judul" name="judul" value="{{ $berita->judul }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                    @error('judul')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Input Slug -->
                <div class="mb-4">
                    <label for="slug" class="block text-gray-700 text-sm font-bold mb-2">Slug (URL)</label>
                    <input type="text" id="slug" name="slug" value="{{ $berita->slug }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                    @error('slug')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Input Isi -->
                <div class="mb-4">
                    <label for="isi" class="block text-gray-700 text-sm font-bold mb-2">Isi Berita</label>
                    <textarea id="isi" name="isi" rows="6"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>{{ $berita->isi }}</textarea>
                    @error('isi')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Radio Button Status -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                    <div class="flex items-center space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="status" value="draft" class="form-radio h-4 w-4 text-blue-600"
                                {{ old('status', $berita->status ?? 'draft') == 'draft' ? 'checked' : '' }}>
                            <span class="ml-2 text-gray-700">Draft</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="status" value="published" class="form-radio h-4 w-4 text-blue-600"
                                {{ old('status', $berita->status ?? 'draft') == 'published' ? 'checked' : '' }}>
                            <span class="ml-2 text-gray-700">Published</span>
                        </label>
                    </div>
                    @error('status')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Input Foto -->
                <div class="mb-6">
                    <!-- Preview Gambar (ditampilkan hanya jika ada gambar) -->
                    @if (isset($berita->gambar) && $berita->gambar)
                        <div class="mb-4">
                            <p class="text-sm text-gray-600 mb-2">Gambar saat ini:</p>
                            <img src="{{ asset('storage/berita_images/' . $berita->gambar) }}" alt="Preview gambar"
                                class="h-40 w-auto rounded shadow-md">
                            <div class="mt-2">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="hapus_gambar" class="form-checkbox h-4 w-4 text-red-600">
                                    <span class="ml-2 text-gray-700 text-sm">Hapus gambar ini</span>
                                </label>
                            </div>
                        </div>
                    @endif

                    <!-- Input Unggah File -->
                    <input type="file" id="gambar" name="gambar"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        accept="image/*">

                    <!-- Preview Gambar Baru (JavaScript) -->
                    <div id="imagePreview" class="mt-4 hidden">
                        <p class="text-sm text-gray-600 mb-2">Preview gambar baru:</p>
                        <img id="previewImage" class="h-40 w-auto rounded shadow-md">
                    </div>

                    @error('gambar')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                    <p class="text-gray-600 text-xs mt-1">Format: JPG, PNG, JPEG. Maksimal 2MB</p>
                </div>

                <!-- Tombol Submit -->
                <div class="flex items-center justify-between">
                    <a href="{{ route('admin.berita.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Kembali
                    </a>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Simpan Berita
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('judul').addEventListener('input', function() {
            const judul = this.value;
            const slug = judul.toLowerCase()
                .replace(/ /g, '-')
                .replace(/[^\w-]+/g, '');
            document.getElementById('slug').value = slug;
        });

        // Preview gambar sebelum upload
        document.getElementById('gambar').addEventListener('change', function(e) {
            const previewContainer = document.getElementById('imagePreview');
            const previewImage = document.getElementById('previewImage');
            const file = e.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                }

                reader.readAsDataURL(file);
            } else {
                previewContainer.classList.add('hidden');
            }
        });
    </script>
@endsection
