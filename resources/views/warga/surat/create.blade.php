@extends('partials.admin.main')
@section('content')
    <div class="flex-1 p-6 overflow-auto">
        <h1 class="text-xl font-semibold mb-6">Ajukan Surat Baru</h1>
        <div class="bg-white shadow-md rounded-lg p-6">

            <form action="{{ route('warga.surat.store') }}" method="POST">
                @csrf

                <label for="surat_jenis_id" class="block font-medium mb-2">Jenis Surat</label>
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

                <!-- Contoh form data_pengajuan (bisa disesuaikan kebutuhan) -->
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

                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    Kirim Pengajuan
                </button>
                <a href="{{ route('warga.surat.index') }}"
                   class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 text-sm transition duration-150">
                    Batal
                </a>
            </form>
        </div>
    </div>
@endsection
