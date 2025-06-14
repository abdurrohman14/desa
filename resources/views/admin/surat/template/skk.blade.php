<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Kematian</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-black font-serif p-10 text-[14px] leading-relaxed">
    <!-- Kop Surat -->
    <div class="text-center border-b border-black pb-2 mb-4">
        <img src="https://upload.wikimedia.org/wikipedia/commons/9/92/Lambang_Kabupaten_Banyuwangi.png"
            alt="Logo" class="mx-auto w-16 mb-2">
        <h1 class="font-bold text-sm">PEMERINTAH KABUPATEN {{ strtoupper($kabupaten) }}</h1>
        <h1 class="font-bold text-sm">KECAMATAN {{ strtoupper($kecamatan) }}</h1>
        <h1 class="font-bold text-sm">DESA {{ strtoupper($desa) }}</h1>
        <p class="text-xs">Jl. Desa {{ strtoupper($desa) }} Kode Pos {{ $kode_pos }}</p>
    </div>

    <!-- Judul Surat -->
    <h2 class="text-center font-bold underline mb-6">SURAT KETERANGAN KEMATIAN</h2>
    <p class="text-center mb-6">Nomor: {{ $nomorSurat }}</p>

    <!-- Isi Surat -->
    <div class="mb-4">
        <p class="mb-4">Yang bertanda tangan dibawah ini :</p>

        <div class="ml-6 space-y-1">
            <div class="flex">
                <div class="w-32">Nama</div>
                <div>: Admin</div>
            </div>
            <div class="flex">
                <div class="w-32">Jabatan</div>
                <div>: Kepala Desa</div>
            </div>
        </div>

        <p class="mt-4">Dengan ini menerangkan bahwa :</p>

        <div class="ml-6 space-y-1 mt-2">
            <div class="flex">
                <div class="w-48">Nama</div>
                <div>: {{$pengajuan->user->name}}</div>
            </div>
            <div class="flex">
                <div class="w-48">NIK</div>
                <div>: {{$pengajuan->user->nik}}</div>
            </div>
            <div class="flex">
                <div class="w-48">Tempat, Tanggal Lahir</div>
                <div>: {{$pengajuan->tempat_lahir}}, {{$pengajuan->tanggal_lahir}}</div>
            </div>
            <div class="flex">
                <div class="w-48">Jenis Kelamin</div>
                <div>: {{$pengajuan->jenis_kelamin}}</div>
            </div>
            <div class="flex">
                <div class="w-48">Alamat</div>
                <div>: {{$pengajuan->alamat}}</div>
            </div>
            <div class="flex">
                <div class="w-48">Keterangan</div>
                <div>: {{$data['keperluan']}}</div>
            </div>
        </div>

        <p class="mt-6">Demikian surat keterangan ini dibuat selanjutnya untuk digunakan sebagai mestinya.</p>
    </div>

    <!-- Tanda Tangan -->
    <div class="mt-12 text-right pr-4">
        <p>{{ strtoupper($desa) }}, 08 Juni 2025</p>
        <p class="mt-1">Kepala Desa Bulusari</p>

        <div class="mt-16">
            <p class="font-bold underline">Fajar Aulia</p>
        </div>
    </div>
</body>

</html>
