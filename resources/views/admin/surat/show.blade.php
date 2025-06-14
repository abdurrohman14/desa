@extends('partials.admin.main')
@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Detail Pengajuan Surat</h1>
            <button type="button" onclick="window.location='{{ route('admin.surat.index') }}'"
                class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-md transition duration-150 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                        clip-rule="evenodd" />
                </svg>
                Kembali
            </button>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
            <div class="p-6 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Nama Pemohon</h3>
                        <p class="mt-1 text-lg font-semibold text-gray-900">{{ $pengajuan->user->name }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Jenis Surat</h3>
                        <p class="mt-1 text-lg font-semibold text-gray-900">{{ $pengajuan->TipeSurat->nama }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Status</h3>
                        <span
                            class="mt-1 inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                        @if ($pengajuan->status == 'pending') bg-yellow-100 text-yellow-800
                        @elseif($pengajuan->status == 'disetujui') bg-green-100 text-green-800
                        @else bg-red-100 text-red-800 @endif">
                            {{ ucfirst($pengajuan->status) }}
                        </span>
                    </div>

                    @if ($pengajuan->file_pendukung)
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">File Pendukung</h3>
                            <a href="{{ Storage::url($pengajuan->file_pendukung) }}" target="_blank"
                                class="mt-1 inline-flex items-center text-blue-600 hover:text-blue-800 transition duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                                Download File
                            </a>
                        </div>
                    @endif
                </div>

                <div>
                    <h3 class="text-sm font-medium text-gray-500">Data Pengajuan</h3>
                    <div class="mt-2 bg-gray-50 p-4 rounded-md">
                        <pre class="text-sm text-gray-800 whitespace-pre-wrap">{{ json_encode($pengajuan->data_pengajuan) }}</pre>
                    </div>
                </div>
            </div>

            @if ($pengajuan->status === 'pending')
                <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                    <form action="{{ route('admin.surat.updateStatus', $pengajuan->id) }}" method="POST"
                        class="flex space-x-3">
                        @csrf
                        <button type="submit" name="status" value="selesai"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            Setujui Pengajuan
                        </button>
                        <button type="submit" name="status" value="ditolak"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                            Tolak Pengajuan
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
@endsection
