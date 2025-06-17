@extends('partials.admin.main')
@section('content')
    <div class="flex-1 p-6 overflow-hidden">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Data Keluarga</h2>
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <a href="{{ route('admin.keluarga.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Tambah
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full border divide-y divide-gray-200" id="example1">
                    <thead class="bg-gray-100 text-left">
                        <tr>
                            <th class="px-4 py-2">No</th>
                            <th class="px-4 py-2">Nama</th>
                            <th class="px-4 py-2">NIK</th>
                            <th class="px-4 py-2">Jenis Kelamin</th>
                            <th class="px-4 py-2">Hubungan</th>
                            <th class="px-4 py-2">Pekerjaan</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($keluargas as $key => $keluarga)
                            <tr>
                                <td class="px-4 py-2">{{ $key + 1 }}</td>
                                <td class="px-4 py-2">{{ $keluarga->nama }}</td>
                                <td class="px-4 py-2">{{ $keluarga->nik }}</td>
                                <td class="px-4 py-2">{{ $keluarga->jenis_kelamin }}</td>
                                <td class="px-4 py-2">{{ $keluarga->status_hubungan }}</td>
                                <td class="px-4 py-2">{{ $keluarga->pekerjaan }}</td>
                                <td class="px-4 py-2 space-x-2">
                                    {{-- <a href="{{ route('admin.keluarga.edit', $keluarga->id) }}"
                                        class="text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ route('keluarga.destroy', $keluarga->id) }}" method="POST"
                                        class="inline-block" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
