<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => 5,
                'judul' => 'Gotong Royong Pembersihan Saluran Air di Dusun 2',
                'slug' => 'gotong-royong-pembersihan-saluran-air-di-dusun-2',
                'isi' => 'Warga Dusun 2 mengadakan kegiatan gotong royong membersihkan saluran air demi mencegah banjir saat musim hujan tiba.',
                'status' => 'published',
                'gambar' => 'gotong_royong.jpg',
            ],
            [
                'kategori_id' => 2,
                'judul' => 'Pembagian BLT Dana Desa Bulan Juni 2025',
                'slug' => 'pembagian-blt-dana-desa-bulan-juni-2025',
                'isi' => 'Pemerintah Desa akan menyalurkan BLT pada hari Jumat, 20 Juni 2025, pukul 09.00 WIB di Balai Desa.',
                'status' => 'published',
                'gambar' => 'blt_juni2025.jpg',
            ],
            [
                'kategori_id' => 1,
                'judul' => 'Sosialisasi Program Sekolah Gratis bagi Anak Kurang Mampu',
                'slug' => 'sosialisasi-program-sekolah-gratis-bagi-anak-kurang-mampu',
                'isi' => 'Dinas Pendidikan bekerjasama dengan Desa mengadakan program sekolah gratis untuk anak kurang mampu.',
                'status' => 'published',
                'gambar' => 'sosialisasi_pendidikan.jpg',
            ],
            [
                'kategori_id' => 6,
                'judul' => 'Posyandu Balita Pemeriksaan Gratis dan Pemberian Makanan Tambahan',
                'slug' => 'posyandu-balita-pemeriksaan-gratis-dan-pemberian-makanan-tambahan',
                'isi' => 'Kegiatan rutin Posyandu dilaksanakan setiap tanggal 5 di Balai Desa.',
                'status' => 'published',
                'gambar' => 'posyandu_balita.jpg',
            ],
        ];

        foreach ($data as $item) {
            Berita::create($item);
        }
    }
}
