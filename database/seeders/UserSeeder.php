<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
                'nik' => '1234567890123456',
                'no_kk' => '3510211402020001',
                'no_hp' => '081234567890',
                'alamat' => 'Jl. Raya No. 1',
                'rt' => '01',
                'rw' => '01',
                'kelurahan' => 'Kelurahan 1',
                'kecamatan' => 'Kecamatan 1',
                'kabupaten' => 'Kabupaten 1',
                'provinsi' => 'Provinsi 1',
                'kode_pos' => '12345',
                'tempat_lahir' => 'Kota 1',
                'tanggal_lahir' => '2000-01-01',
                'jenis_kelamin' => 'Laki-laki',
                'agama' => 'Islam',
                'pekerjaan' => 'Pekerjaan 1',
                'status_perkawinan' => 'Belum Menikah',
                'umur' => '23',
                'foto' => 'default.jpg',
                'pendidikan_terakhir' => 'SLTA/Sederajat',
                'kewarganegaraan' => 'WNI'
            ],
            [
                'name' => 'Abdur Rohman',
                'email' => 'rabd5428@gmail.com',
                'password' => bcrypt('rohman123'),
                'role' => 'warga',
                'nik' => '3510211402030005',
                'no_kk' => '35102102140352510',
                'no_hp' => '081234567890',
                'alamat' => 'Jl. Johar Dsn. Pekarangan',
                'rt' => '002',
                'rw' => '002',
                'kelurahan' => 'Kelurahan Kelir',
                'kecamatan' => 'Kecamatan Kalipuro',
                'kabupaten' => 'Kabupaten Banyuwangi',
                'provinsi' => 'Provinsi Jawa Timur',
                'kode_pos' => '68455',
                'tempat_lahir' => 'Banyuwangi',
                'tanggal_lahir' => '2003-02-14',
                'jenis_kelamin' => 'Laki-laki',
                'agama' => 'Islam',
                'pekerjaan' => 'Mahasiswa',
                'status_perkawinan' => 'Belum Menikah',
                'umur' => '22',
                'foto' => 'default.jpg',
                'pendidikan_terakhir' => 'SLTA/Sederajat',
                'kewarganegaraan' => 'WNI'
            ]
        ]);
    }
}
