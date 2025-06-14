@extends('partials.admin.main')
@section('content')
    <div class="flex-1 p-6 overflow-auto max-h-[calc(100vh-150px)]">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Edit Galeri</h2>
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

            <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Dropdown Kategori -->
                <div class="mb-4">
                    <label for="kategori_id" class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
                    <select name="kategori_id" id="kategori_id"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}"
                                {{ $galeri->kategori_id == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Judul</label>
                    <input type="text" id="judul" name="judul" value="{{ old('judul', $galeri->judul) }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('judul')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="foto" class="block text-gray-700 text-sm font-bold mb-2">Gambar (Opsional)</label>
                    @if ($galeri->foto)
                        <img src="{{ asset('storage/' . $galeri->foto) }}" alt="Gambar" class="w-40 mb-2">
                    @endif
                    <input type="file" id="foto" name="foto"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('foto')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="video" class="block text-gray-700 text-sm font-bold mb-2">Link Video YouTube
                        (Opsional)</label>
                    <input type="url" id="video" name="video" value="{{ old('video', $galeri->video) }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="https://www.youtube.com/watch?v=xxxxxxx">
                    @error('video')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                    <p class="text-gray-600 text-xs mt-1">Masukkan link video dari YouTube.</p>
                </div>

                <div id="video-preview" class="mb-4">
                    @if ($galeri->video)
                        @php
                            preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^&]+)/', $galeri->video, $matches);
                            $videoId = $matches[1] ?? null;
                        @endphp
                        @if ($videoId)
                            <iframe class="w-full aspect-video" src="https://www.youtube.com/embed/{{ $videoId }}"
                                frameborder="0" allowfullscreen></iframe>
                        @endif
                    @endif
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
        document.getElementById('video').addEventListener('input', function() {
            const url = this.value;
            const previewContainer = document.getElementById('video-preview');
            const match = url.match(/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^&]+)/);

            if (match && match[1]) {
                const videoId = match[1];
                previewContainer.innerHTML =
                    `<iframe class="w-full aspect-video mt-4" src="https://www.youtube.com/embed/${videoId}" frameborder="0" allowfullscreen></iframe>`;
            } else {
                previewContainer.innerHTML = '';
            }
        });
    </script>
@endsection
