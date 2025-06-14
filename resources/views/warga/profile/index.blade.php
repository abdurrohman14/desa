@extends('partials.lp.main')
@section('content')
    <div class="flex-1 p-6 overflow-auto">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Ubah Profil</h2>
        <div class="bg-white shadow-md rounded-lg p-6">

            <form action="{{ route('warga.update.profile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="flex flex-col md:flex-row gap-6">
                    <!-- Foto -->
                    <div class="w-full md:w-1/3 flex flex-col items-center">
                        <div class="w-48 h-48 rounded-full overflow-hidden border-4 border-blue-100 mb-4">
                            <img src="{{ asset('storage/profiles/' . $profile['foto']) }}" alt="Profile Photo"
                                class="w-full h-full object-cover" id="profile-preview">
                        </div>
                        <input type="file" name="foto" id="foto" class="hidden" accept="image/*">
                        <button type="button" onclick="document.getElementById('foto').click()"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Ganti Foto
                        </button>
                        @error('foto')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Detail -->
                    <div class="w-full md:w-2/3 space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Non-editable fields -->
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Nama</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $profile['nama'] }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">NIK</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $profile['nik'] }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Email</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $profile['email'] }}</p>
                            </div>

                            <!-- Editable fields -->
                            <div>
                                <label for="no_kk" class="block text-sm font-medium text-gray-700">No. KK</label>
                                <input type="text" name="no_kk" id="no_kk"
                                    value="{{ old('no_kk', $profile['no_kk']) }}"
                                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                @error('no_kk')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="no_hp" class="block text-sm font-medium text-gray-700">No HP</label>
                                <input type="text" name="no_hp" id="no_hp"
                                    value="{{ old('no_hp', $profile['no_hp']) }}"
                                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                @error('no_hp')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="tempat_lahir" class="block text-sm font-medium text-gray-700">Tempat
                                    Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir"
                                    value="{{ old('tempat_lahir', $profile['tempat_lahir']) }}"
                                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                @error('tempat_lahir')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal
                                    Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                    value="{{ old('tanggal_lahir', $profile['tanggal_lahir']) }}"
                                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                @error('tanggal_lahir')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis
                                    Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin"
                                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                    <option value="Laki-laki"
                                        {{ old('jenis_kelamin', $profile['jenis_kelamin']) == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="Perempuan"
                                        {{ old('jenis_kelamin', $profile['jenis_kelamin']) == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="agama" class="block text-sm font-medium text-gray-700">Agama</label>
                                <select name="agama" id="agama"
                                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                    <option value="Islam"
                                        {{ old('agama', $profile['agama']) == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Kristen"
                                        {{ old('agama', $profile['agama']) == 'Kristen' ? 'selected' : '' }}>Kristen
                                    </option>
                                    <option value="Katolik"
                                        {{ old('agama', $profile['agama']) == 'Katolik' ? 'selected' : '' }}>Katolik
                                    </option>
                                    <option value="Hindu"
                                        {{ old('agama', $profile['agama']) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                    <option value="Buddha"
                                        {{ old('agama', $profile['agama']) == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                    <option value="Konghucu"
                                        {{ old('agama', $profile['agama']) == 'Konghucu' ? 'selected' : '' }}>Konghucu
                                    </option>
                                </select>
                                @error('agama')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="status_perkawinan" class="block text-sm font-medium text-gray-700">Status
                                    Perkawinan</label>
                                <select name="status_perkawinan" id="status_perkawinan"
                                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                    <option value="Belum Kawin"
                                        {{ old('status_perkawinan', $profile['status_perkawinan']) == 'Belum Kawin' ? 'selected' : '' }}>
                                        Belum Kawin</option>
                                    <option value="Kawin"
                                        {{ old('status_perkawinan', $profile['status_perkawinan']) == 'Kawin' ? 'selected' : '' }}>
                                        Kawin</option>
                                    <option value="Cerai Hidup"
                                        {{ old('status_perkawinan', $profile['status_perkawinan']) == 'Cerai Hidup' ? 'selected' : '' }}>
                                        Cerai Hidup</option>
                                    <option value="Cerai Mati"
                                        {{ old('status_perkawinan', $profile['status_perkawinan']) == 'Cerai Mati' ? 'selected' : '' }}>
                                        Cerai Mati</option>
                                </select>
                                @error('status_perkawinan')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="pendidikan_terakhir" class="block text-sm font-medium text-gray-700">Pendidikan Terakhir</label>
                                <input type="text" name="pendidikan_terakhir" id="pendidikan_terakhir"
                                    value="{{ old('pendidikan_terakhir', $profile['pendidikan_terakhir']) }}"
                                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                @error('pendidikan_terakhir')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="kewarganegaraan" class="block text-sm font-medium text-gray-700">Kewarganegaraan</label>
                                <input type="text" name="kewarganegaraan" id="kewarganegaraan"
                                    value="{{ old('kewarganegaraan', $profile['kewarganegaraan']) }}"
                                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                @error('kewarganegaraan')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="umur" class="block text-sm font-medium text-gray-700">Umur</label>
                                <input type="number" name="umur" id="umur"
                                    value="{{ old('umur', $profile['umur']) }}"
                                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                @error('umur')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="pekerjaan" class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                                <input type="text" name="pekerjaan" id="pekerjaan"
                                    value="{{ old('pekerjaan', $profile['pekerjaan']) }}"
                                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                @error('pekerjaan')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                                <textarea name="alamat" id="alamat" rows="2"
                                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">{{ old('alamat', $profile['alamat']) }}</textarea>
                                @error('alamat')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="rt" class="block text-sm font-medium text-gray-700">RT</label>
                                    <input type="text" name="rt" id="rt"
                                        value="{{ old('rt', $profile['rt']) }}"
                                        class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                    @error('rt')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="rw" class="block text-sm font-medium text-gray-700">RW</label>
                                    <input type="text" name="rw" id="rw"
                                        value="{{ old('rw', $profile['rw']) }}"
                                        class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                    @error('rw')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="kelurahan" class="block text-sm font-medium text-gray-700">Kelurahan</label>
                                <input type="text" name="kelurahan" id="kelurahan"
                                    value="{{ old('kelurahan', $profile['kelurahan']) }}"
                                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                @error('kelurahan')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="kecamatan" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                                <input type="text" name="kecamatan" id="kecamatan"
                                    value="{{ old('kecamatan', $profile['kecamatan']) }}"
                                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                @error('kecamatan')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="kabupaten" class="block text-sm font-medium text-gray-700">Kabupaten</label>
                                <input type="text" name="kabupaten" id="kabupaten"
                                    value="{{ old('kabupaten', $profile['kabupaten']) }}"
                                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                @error('kabupaten')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="provinsi" class="block text-sm font-medium text-gray-700">Provinsi</label>
                                <input type="text" name="provinsi" id="provinsi"
                                    value="{{ old('provinsi', $profile['provinsi']) }}"
                                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                @error('provinsi')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="kode_pos" class="block text-sm font-medium text-gray-700">Kode Pos</label>
                                <input type="text" name="kode_pos" id="kode_pos"
                                    value="{{ old('kode_pos', $profile['kode_pos']) }}"
                                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                @error('kode_pos')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <a href="{{ url('/') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 mr-2 rounded focus:outline-none focus:shadow-outline">
                        Kembali
                    </a>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
    // Preview image before upload
    document.getElementById('foto').addEventListener('change', function(e) {
        const reader = new FileReader();
        reader.onload = function(event) {
            document.getElementById('profile-preview').src = event.target.result;
        };
        reader.readAsDataURL(e.target.files[0]);
    });
</script>
@endsection
