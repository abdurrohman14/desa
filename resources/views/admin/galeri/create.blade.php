@extends('partials.admin.main')
@section('content')
    <div class="flex-1 p-6 overflow-auto max-h-[calc(100vh-150px)]">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Tambah Galeri</h2>
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

            <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Dropdown Kategori -->
                <div class="mb-4">
                    <label for="kategori_id" class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
                    <select id="kategori_id" name="kategori_id"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Input Judul -->
                <div class="mb-4">
                    <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Judul</label>
                    <input type="text" id="judul" name="judul"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                    @error('judul')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Input Foto -->
                <div class="mb-6">
                    <label for="foto" class="block text-gray-700 text-sm font-bold mb-2">Foto</label>
                    <input type="file" id="foto" name="gambar"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        accept="image/*">
                    @error('foto')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                    <p class="text-gray-600 text-xs mt-1">Format: JPG, PNG, JPEG. Maksimal 2MB</p>
                </div>

                <!-- Input Video -->
                <div class="mb-4">
                    <label for="video" class="block text-gray-700 text-sm font-bold mb-2">Link Video YouTube
                        (Opsional)</label>
                    <input type="url" id="video" name="video"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="https://www.youtube.com/watch?v=xxxxxxx">
                    @error('video')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                    <p class="text-gray-600 text-xs mt-1">Masukkan link video dari YouTube.</p>
                </div>

                <div id="video-preview" class="mt-4 hidden mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Preview Video:</label>
                    <iframe id="youtube-iframe" width="100%" height="315" class="rounded border" src=""
                        frameborder="0" allowfullscreen></iframe>
                </div>

                <!-- Tombol Submit -->
                <div class="flex items-center justify-end">
                    <a href="{{ route('admin.galeri.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2">
                        Kembali
                    </a>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('video').addEventListener('input', function(e) {
            const url = e.target.value.trim();
            const previewDiv = document.getElementById('video-preview');
            const iframe = document.getElementById('youtube-iframe');

            // Coba ambil video ID dari berbagai format URL
            let videoId = null;

            // Format standar: youtube.com/watch?v=VIDEO_ID
            const match1 = url.match(/v=([^&]+)/);
            if (match1) videoId = match1[1];

            // Format pendek: youtu.be/VIDEO_ID
            const match2 = url.match(/youtu\.be\/([^?&]+)/);
            if (match2) videoId = match2[1];

            if (videoId) {
                iframe.src = `https://www.youtube.com/embed/${videoId}`;
                previewDiv.classList.remove('hidden');
            } else {
                iframe.src = '';
                previewDiv.classList.add('hidden');
            }
        });
    </script>
@endsection
