@extends('partials.admin.main')
@section('content')
    <div class="flex-1 p-6 overflow-hidden">
        <h1 class="text-xl font-semibold mb-6">Daftar Pengajuan Surat</h1>
        <div class="bg-white shadow-md rounded-lg p-6">

            <a href="{{ route('warga.surat.create') }}"
                class="inline-block mb-6 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Ajukan Surat Baru
            </a>

            @if ($suratPengajuans->isEmpty())
                <p>Belum ada pengajuan surat.</p>
            @else
                <table class="min-w-full border border-gray-300 rounded" id="example1">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2 text-right">No</th>
                            <th class="border px-4 py-2 text-right">Nomor Surat</th>
                            <th class="border px-4 py-2 text-right">Jenis Surat</th>
                            <th class="border px-4 py-2 text-right">Tanggal Pengajuan</th>
                            <th class="border px-4 py-2 text-right">Tanggal Selesai</th>
                            <th class="border px-4 py-2 text-right">Status</th>
                            <th class="border px-4 py-2 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suratPengajuans as $key => $surat)
                            <tr class="hover:bg-gray-50">
                                <td class="border px-4 py-2">{{ $key + 1 }}</td>
                                <td class="border px-4 py-2">{{ $surat->nomor_surat }}</td>
                                <td class="border px-4 py-2">{{ $surat->TipeSurat->nama }}</td>
                                <td class="border px-4 py-2">
                                    {{ $surat->tanggal_pengajuan->locale('id')->translatedFormat('d F Y') }}</td>
                                <td class="border px-4 py-2">
                                    {{ $surat->tanggal_selesai ? \Carbon\Carbon::parse($surat->tanggal_selesai)->locale('id')->translatedFormat('d F Y') : '-' }}
                                </td>
                                <td class="py-4 px-4">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
        @if ($surat->status == 'pending') bg-yellow-100 text-yellow-800
        @elseif ($surat->status == 'selesai') bg-green-100 text-green-800
        @else bg-red-100 text-red-800 @endif">
                                        {{ ucfirst($surat->status) }}
                                    </span>
                                </td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('warga.surat.show', $surat->id) }}"
                                        class="inline-flex items-center rounded-md text-xs justify-center p-1 bg-blue-500 text-white hover:bg-blue-600 transition-colors duration-200 border border-blue-200 hover:border-blue-300 shadow-sm"
                                        title="Detail">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                            <path fill-rule="evenodd"
                                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
