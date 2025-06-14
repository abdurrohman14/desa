@php
    use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html>

<head>
    <title>Surat Keterangan Tidak Mampu</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 40px;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: auto;
        }

        .kop-surat {
            display: flex;
            align-items: center;
            /* sejajarkan secara vertikal tengah */
            gap: 15px;
            margin-bottom: 10px;
        }

        .kop-surat .logo {
            width: 80px;
            height: 80px;
            object-fit: contain;
            display: block;
        }

        .kop-text {
            display: flex;
            flex-direction: column;
            justify-content: center;
            /* pastikan teks di tengah blok */
            text-align: center;
            line-height: 1.3;
        }

        .kop-text h5,
        .kop-text h6,
        .kop-text p {
            margin: 0;
            padding: 0;
        }

        .kop-line {
            border-bottom: 3px solid black;
            margin-top: 5px;
            margin-bottom: 20px;
        }

        .logo {
            width: 80px;
        }

        .text-center {
            text-align: center;
        }

        .text-end {
            text-align: right;
        }

        .fw-bold {
            font-weight: bold;
        }

        .text-decoration-underline {
            text-decoration: underline;
        }

        .mb-0 {
            margin-bottom: 0;
        }

        .mb-1 {
            margin-bottom: 0.25rem;
        }

        .mb-3 {
            margin-bottom: 1rem;
        }

        .mb-5 {
            margin-bottom: 3rem;
        }

        .mt-3 {
            margin-top: 1rem;
        }

        .mt-5 {
            margin-top: 3rem;
        }

        .my-4 {
            margin-top: 1.5rem;
            margin-bottom: 1.5rem;
        }

        table {
            width: 100%;
            margin-left: 2rem;
            margin-bottom: 1rem;
        }

        table td {
            vertical-align: top;
            padding-bottom: 4px;
        }

        table td:first-child {
            width: 180px;
        }

        @media print {
            body {
                margin: 2cm;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- Kop Surat -->
        <div class="kop-surat">
            <img src="{{ public_path('assets/images/logo-desa.png') }}" alt="Logo" class="logo">
            <div class="kop-text">
                <h5 class="mb-0 fw-bold">{{ strtoupper($kabupaten) }}</h5>
                <h6 class="mb-0">{{ strtoupper($kecamatan) }}</h6>
                <h5 class="fw-bold mb-0">{{ strtoupper($desa) }}</h5>
                <p class="mb-0">Jl. {{ strtoupper($desa) }}, Kode Pos {{ $kode_pos }}</p>
            </div>
        </div>
        <div class="kop-line"></div>

        <!-- Judul Surat -->
        <div class="text-center my-4">
            <h5 class="fw-bold text-decoration-underline mb-0">SURAT KETERANGAN TIDAK MAMPU</h5>
        </div>

        <!-- Identitas Penandatangan -->
        <p>Yang bertanda tangan di bawah ini:</p>
        <table>
            <tr>
                <td>Nama</td>
                <td>: Admin</td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>: Kepala Desa</td>
            </tr>
        </table>

        <!-- Identitas Penduduk -->
        <p>Dengan ini menerangkan bahwa:</p>
        <table>
            <tr>
                <td>Nama</td>
                <td>: {{ $pengajuan->user->name }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>: {{ $pengajuan->user->nik }}</td>
            </tr>
            <tr>
                <td>Tempat, Tanggal Lahir</td>
                <td>: {{ $pengajuan->user->tempat_lahir }},
                    {{ Carbon::parse($pengajuan->user->tanggal_lahir)->locale('id')->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: {{ $pengajuan->user->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: {{ $pengajuan->user->alamat }}</td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>: {{ $data['keperluan'] }}</td>
            </tr>
        </table>

        <!-- Penutup -->
        <p class="mt-3">Demikian surat keterangan ini dibuat untuk digunakan sebagaimana mestinya.</p>

        <!-- Tanda Tangan -->
        <div class="text-end mt-5">
            <p class="mb-1">{{ strtoupper($desa) }},
                {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('d F Y') }}</p>
            <p class="mb-5">Kepala {{ $desa }}</p>
            <p class="fw-bold mt-5 mb-0">Fajar Aulia</p>
        </div>

    </div>

</body>

</html>
