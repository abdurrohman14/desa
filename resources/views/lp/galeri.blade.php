@extends('partials.lp.main')
@section('content')
    <div class="container mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold text-center mb-10 text-gray-800">Galeri</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($galeris as $item)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    @if ($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}"
                            class="w-full h-56 object-cover">
                    @elseif ($item->video)
                        @php
                            preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^&]+)/', $item->video, $matches);
                            $videoId = $matches[1] ?? null;
                        @endphp
                        @if ($videoId)
                            <iframe class="w-full aspect-video" src="https://www.youtube.com/embed/{{ $videoId }}"
                                frameborder="0" allowfullscreen></iframe>
                        @endif
                    @endif

                    <div class="p-4">
                        <h2 class="text-xl font-semibold text-gray-800">{{ $item->judul }}</h2>
                        <p class="text-sm text-gray-500 mt-1">Kategori: {{ $item->kategori->nama ?? '-' }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        @if ($galeris->isEmpty())
            <p class="text-center text-gray-500 mt-10">Belum ada galeri ditampilkan.</p>
        @endif
    </div>
@endsection
