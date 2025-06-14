@extends('partials.admin.main')
@section('content')
    <div class="flex-1 p-6 overflow-hidden">
        <h1 class="text-xl font-bold mb-6 text-gray-800">{{ $title }}</h1>

        <div class="bg-white shadow-md rounded-lg p-6">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-lg overflow-hidden" id="example1">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="py-3 px-4 text-left">No</th>
                            <th class="py-3 px-4 text-left">Nama</th>
                            <th class="py-3 px-4 text-left">Nomor Surat</th>
                            <th class="py-3 px-4 text-left">Jenis Surat</th>
                            <th class="py-3 px-4 text-left">Status</th>
                            <th class="py-3 px-4 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="pengajuan-list" class="divide-y divide-gray-200">
                        @foreach ($pengajuans as $key => $item)
                            <tr class="hover:bg-gray-50">
                                <td class="py-4 px-4">{{ $key + 1 }}</td>
                                <td class="py-4 px-4">{{ $item->user->name }}</td>
                                <td class="py-4 px-4">{{ $item->nomor_surat ?? '-' }}</td>
                                <td class="py-4 px-4">{{ $item->TipeSurat->nama }}</td>
                                <td class="py-4 px-4">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                @if ($item->status == 'pending') bg-yellow-100 text-yellow-800
                                @elseif($item->status == 'disetujui') bg-green-100 text-green-800
                                @else bg-red-100 text-red-800 @endif">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                                <td class="py-4 px-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-3">
                                        <!-- Detail Button -->
                                        <a href="{{ route('admin.surat.show', $item->id) }}"
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

                                        <!-- Generate PDF Button -->
                                        <a href="{{ route('admin.surat.generate', $item->id) }}"
                                            class="inline-flex items-center px-2 py-1.5 justify-center border border-transparent text-xs font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200"
                                            title="Generate PDF">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
