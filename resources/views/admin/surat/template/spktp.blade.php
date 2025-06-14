<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Surat Pengatan KTP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
        @layer utilities {
            @font-face {
                font-family: 'DejaVu Sans';
                src: url('/fonts/DejaVuSans.ttf') format('truetype');
            }

            body {
                font-family: 'DejaVu Sans', sans-serif;
            }
        }
    </style>
</head>

<body class="bg-white text-gray-800 font-sans text-sm p-8">
    <!-- Kop Surat -->
    <div class="text-center border-b-2 border-black pb-4 mb-6">
        <h1 class="text-xl font-bold">PEMERINTAH DESA {{ strtoupper($desa) }}</h1>
        <h2 class="text-lg">KECAMATAN {{ strtoupper($kecamatan) }}</h2>
        <h3 class="text-md">KABUPATEN {{ strtoupper($kabupaten) }}</h3>
        <p class="text-xs italic mt-2">Jl. Raya Desa {{ $desa }} - Kode Pos: {{ $kode_pos }}</p>
    </div>

    <!-- Judul Surat -->
    <h3 class="text-center text-lg font-bold underline mb-6">SURAT PENGANTAR KTP</h3>
    <p class="text-center mb-6">Nomor: {{ $nomorSurat }}</p>

    <!-- Isi Surat -->
    <div class="mb-4">
        <p class="mb-4">Yang bertanda tangan di bawah ini menyatakan bahwa:</p>

        <div class="ml-8 space-y-2">
            <div class="flex">
                <p class="w-32">Nama</p>
                <p>: {{ $pengajuan->user->name }}</p>
            </div>
            <div class="flex">
                <p class="w-32">NIK</p>
                <p>: {{ $pengajuan->user->nik }}</p>
            </div>
            <div class="flex">
                <p class="w-32">Alamat</p>
                <p>: {{ $data['alamat'] ?? '-' }}</p>
            </div>
        </div>

        <p class="mt-4">Adalah benar warga yang tidak mampu secara ekonomi.</p>
    </div>

    <!-- Tanda Tangan -->
    <div class="mt-20 text-right mr-16">
        <p>{{ $desa }}, {{ $tanggal }}</p>
        <p class="mt-1">Kepala Desa {{ $desa }}</p>

        <div class="mt-16">
            <p class="font-bold underline">{{ $ttd['nama'] }}</p>
            <p class="mt-1">NIP: {{ $ttd['nip'] }}</p>
        </div>
    </div>
</body>

</html>
