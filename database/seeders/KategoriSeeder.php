<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategoris')->insert([
            [
                'nama' => 'Pendidikan',
                'tipe' => 'berita',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Umum',
                'tipe' => 'berita',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Kuliner',
                'tipe' => 'umkm',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Fashion',
                'tipe' => 'umkm',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
