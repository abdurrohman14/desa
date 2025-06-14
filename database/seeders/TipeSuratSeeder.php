<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TipeSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipe_surats')->insert([
            [
                'kode_surat' => 'SKTM',
                'nama' => 'Surat Keterangan Tidak Mampu',
                'deskripsi' => '',
                'template_view' => 'admin.surat.template.sktm',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_surat' => 'SKK',
                'nama' => 'Surat Keterangan Kematian',
                'deskripsi' => '',
                'template_view' => 'admin.surat.template.skk',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_surat' => 'SPKTP',
                'nama' => 'Surat Pengantar KTP',
                'deskripsi' => '',
                'template_view' => 'admin.surat.template.spktp',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
