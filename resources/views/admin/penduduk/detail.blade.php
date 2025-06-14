<div class="col-span-2">
    <div class="border-b pb-2 mb-2">
        <h4 class="font-semibold">Informasi Pribadi</h4>
    </div>
</div>

<div>
    <p class="text-sm text-gray-500">NIK</p>
    <p class="font-medium">{{ $penduduk->nik }}</p>
</div>

<div>
    <p class="text-sm text-gray-500">No KK</p>
    <p class="font-medium">{{ $penduduk->no_kk }}</p>
</div>

<div>
    <p class="text-sm text-gray-500">Nama Lengkap</p>
    <p class="font-medium">{{ $penduduk->name }}</p>
</div>

<div>
    <p class="text-sm text-gray-500">Jenis Kelamin</p>
    <p class="font-medium">{{ $penduduk->jenis_kelamin }}</p>
</div>

<div>
    <p class="text-sm text-gray-500">Tempat, Tanggal Lahir</p>
    <p class="font-medium">{{ $penduduk->tempat_lahir }}, {{ $penduduk->tanggal_lahir_formatted }}</p>
</div>

<div>
    <p class="text-sm text-gray-500">Agama</p>
    <p class="font-medium">{{ $penduduk->agama ?? '-' }}</p>
</div>

<div>
    <p class="text-sm text-gray-500">Pendidikan</p>
    <p class="font-medium">{{ $penduduk->pendidikan_terakhir ?? '-' }}</p>
</div>

<div>
    <p class="text-sm text-gray-500">Pekerjaan</p>
    <p class="font-medium">{{ $penduduk->pekerjaan ?? '-' }}</p>
</div>

<div>
    <p class="text-sm text-gray-500">Status Perkawinan</p>
    <p class="font-medium">{{ $penduduk->status_perkawinan ?? '-' }}</p>
</div>

<div>
    <p class="text-sm text-gray-500">Kewarganegaraan</p>
    <p class="font-medium">{{ $penduduk->kewarganegaraan ?? '-' }}</p>
</div>

<div class="col-span-2">
    <div class="border-b pb-2 mb-2 mt-4">
        <h4 class="font-semibold">Informasi Alamat</h4>
    </div>
</div>

<div>
    <p class="text-sm text-gray-500">Alamat</p>
    <p class="font-medium">{{ $penduduk->alamat ?? '-' }}</p>
</div>

<div>
    <p class="text-sm text-gray-500">RT/RW</p>
    <p class="font-medium">{{ $penduduk->rt ?? '-' }} / {{ $penduduk->rw ?? '-' }}</p>
</div>

<div>
    <p class="text-sm text-gray-500">Desa/Kelurahan</p>
    <p class="font-medium">{{ $penduduk->kelurahan ?? '-' }}</p>
</div>

<div>
    <p class="text-sm text-gray-500">Kecamatan</p>
    <p class="font-medium">{{ $penduduk->kecamatan ?? '-' }}</p>
</div>

<div>
    <p class="text-sm text-gray-500">Kabupaten/Kota</p>
    <p class="font-medium">{{ $penduduk->kabupaten ?? '-' }}</p>
</div>

<div>
    <p class="text-sm text-gray-500">Provinsi</p>
    <p class="font-medium">{{ $penduduk->provinsi ?? '-' }}</p>
</div>
