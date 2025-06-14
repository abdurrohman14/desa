@extends('partials.admin.main')
@section('content')
    <div class="flex-1 p-6 overflow-auto">
        <h2 class="text-xl font-semibold mb-4">Tambah Anggota Keluarga</h2>
        <div class="bg-white shadow-md rounded-lg p-6 mx-auto">

            <form action="{{ route('admin.keluarga.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700">Nama</label>
                    <input type="text" name="nama" class="w-full px-4 py-2 border rounded" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">NIK</label>
                    <input type="text" name="nik" class="w-full px-4 py-2 border rounded">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="w-full px-4 py-2 border rounded">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="w-full px-4 py-2 border rounded">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="w-full px-4 py-2 border rounded" required>
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Agama</label>
                    <select name="agama" class="w-full px-4 py-2 border rounded" required>
                        <option value="">-- Pilih --</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katholik">Katholik</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Hindu">Hindu</option>
                        <option value="KongHucu">KongHucu</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Pendidikan</label>
                    <input type="text" name="pendidikan" class="w-full px-4 py-2 border rounded">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="w-full px-4 py-2 border rounded">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Status Hubungan</label>
                    <select name="status_hubungan" class="w-full px-4 py-2 border rounded" required>
                        <option value="">-- Pilih --</option>
                        <option value="Suami">Suami</option>
                        <option value="Istri">Istri</option>
                        <option value="Anak">Anak</option>
                        <option value="Orang Tua">Orang Tua</option>
                        <option value="Saudara">Saudara</option>
                    </select>
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('admin.keluarga.index') }}"
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 mr-2">Batal</a>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
