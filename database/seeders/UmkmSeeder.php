<?php

namespace Database\Seeders;

use App\Models\Umkm;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UmkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $data = [
            [
                'kategori_id' => 3,
                'nama' => 'Dapur Mbak Sari',
                'pemilik' => 'Sari Utami',
                'no_hp' => '081234567890',
                'alamat' => 'Dusun 1, RT 02 RW 01',
                'deskripsi' => 'Menjual aneka kue basah dan jajanan pasar.',
                'gambar' => 'dapur_mbak_sari.jpg',
            ],
            [
                'kategori_id' => 4,
                'nama' => 'Batik Tulis Lestari',
                'pemilik' => 'Lestari Ayu',
                'no_hp' => '082112345678',
                'alamat' => 'Dusun 3, RT 05 RW 02',
                'deskripsi' => 'Produksi batik tulis khas desa.',
                'gambar' => 'batik_lestari.jpg',
            ],
            [
                'kategori_id' => 7,
                'nama' => 'Sayur Segar Pak Tono',
                'pemilik' => 'Tono Supriyadi',
                'no_hp' => '085698765432',
                'alamat' => 'Dusun 2, RT 01 RW 01',
                'deskripsi' => 'Menyediakan sayuran organik.',
                'gambar' => 'sayur_pak_tono.jpg',
            ],
            [
                'kategori_id' => 8,
                'nama' => 'Bengkel Motor Bang Udin',
                'pemilik' => 'Udin Setiawan',
                'no_hp' => '089988887777',
                'alamat' => 'Dekat Lapangan Bola, RT 03 RW 01',
                'deskripsi' => 'Servis motor buka tiap hari 07.00-17.00.',
                'gambar' => 'bengkel_bang_udin.jpg',
            ],
            [
                'kategori_id' => 9,
                'nama' => 'Jahit Baju "Rapi Jaya"',
                'pemilik' => 'Rani Lestiani',
                'no_hp' => '087766665555',
                'alamat' => 'Dusun 4, RT 06 RW 02',
                'deskripsi' => 'Jasa jahit pakaian pria & wanita.',
                'gambar' => 'jahit_rapi_jaya.jpg',
            ],
        ];

        foreach ($data as $item) {
            Umkm::create($item);
        }
    }
}
