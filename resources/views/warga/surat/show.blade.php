@extends('partials.admin.main')
@section('content')
<div class="flex-1 p-6 overflow-auto">
    <h1 class="text-xl font-semibold text-gray-800 mb-4">Detail Pengajuan Surat</h1>
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <!-- Header Section -->
        {{-- <div class="px-6 py-4 border-b border-gray-200">
            <p class="text-sm text-gray-500 mt-1">ID: {{ $pengajuan->id }}</p>
        </div> --}}

        <!-- Main Content -->
        <div class="p-6">
            <!-- Basic Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="space-y-2">
                    <h2 class="text-lg font-medium text-gray-700">Informasi Pengajuan</h2>
                    <div class="space-y-1">
                        <p><span class="font-medium text-gray-600">Jenis Surat:</span> {{ $pengajuan->TipeSurat->nama }}</p>
                        <p>
                            <span class="font-medium text-gray-600">Status:</span>
                            <span class="px-2 py-1 text-xs rounded-full
                                @if($pengajuan->status === 'pending') bg-yellow-100 text-yellow-800
                                @elseif($pengajuan->status === 'selesai') bg-green-100 text-green-800
                                @else bg-red-100 text-red-800 @endif">
                                {{ ucfirst($pengajuan->status) }}
                            </span>
                        </p>
                        <p><span class="font-medium text-gray-600">Tanggal Pengajuan:</span> {{ $pengajuan->tanggal_pengajuan->translatedFormat('d F Y') }}</p>
                        @if ($pengajuan->tanggal_selesai)
                            <p><span class="font-medium text-gray-600">Tanggal Selesai:</span> {{ $pengajuan->tanggal_selesai->translatedFormat('d F Y') }}</p>
                        @endif
                    </div>
                </div>

                <!-- User Information -->
                <div class="space-y-2">
                    <h2 class="text-lg font-medium text-gray-700">Informasi Pemohon</h2>
                    <div class="space-y-1">
                        <p><span class="font-medium text-gray-600">Nama:</span> {{ $pengajuan->user->name }}</p>
                        <p><span class="font-medium text-gray-600">Email:</span> {{ $pengajuan->user->email }}</p>
                        @if($pengajuan->user->phone)
                            <p><span class="font-medium text-gray-600">Telepon:</span> {{ $pengajuan->user->phone }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Document Content -->
            <div class="mb-6">
                <h2 class="text-lg font-medium text-gray-700 mb-3">Isi Surat</h2>
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <pre class="text-sm text-gray-800 whitespace-pre-wrap font-mono">{{ json_encode($pengajuan->data_pengajuan) }}</pre>
                </div>
            </div>

            <!-- Document Download -->
            <div class="mb-6">
                <h2 class="text-lg font-medium text-gray-700 mb-3">Dokumen</h2>
                @if ($pengajuan->status === 'selesai' && $pengajuan->dokumen)
                    <div class="flex items-center space-x-4">
                        <a href="{{ Storage::url($pengajuan->dokumen->file_path) }}"
                           class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-150"
                           target="_blank"
                           download="{{ $pengajuan->dokumen->nama_file }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                            Download Surat
                        </a>
                        <span class="text-sm text-gray-500">{{ $pengajuan->dokumen->nama_file }}</span>
                    </div>
                @else
                    <p class="text-gray-500">Surat belum tersedia untuk diunduh.</p>
                @endif
            </div>

            <!-- Back Button -->
            <div class="flex justify-end">
                <a href="{{ route('warga.surat.index') }}"
                   class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-600 transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                    Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
