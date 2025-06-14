<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TemplateSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('template_surats')->insert([
            [
                'tipe_surat_id' => 1, // Sesuaikan dengan ID tipe surat yang ada
                'nama' => 'Surat Keterangan Domisili',
                'konten' => '<h1>Surat Keterangan Domisili</h1><p>...</p>',
                'isi' => '{"nama":"","nik":"","alamat":""}', // JSON format jika perlu
                'aktif' => true,
                'created_by' => 1, // ID admin/user yang membuat
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'tipe_surat_id' => 2,
                'nama' => 'Surat Keterangan Tidak Mampu',
                'konten' => '<h1>SKTM</h1><p>...</p>',
                'isi' => '{"nama":"","nik":"","alasan":""}',
                'aktif' => true,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
