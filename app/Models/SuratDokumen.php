<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratDokumen extends Model
{
    protected $fillable = [
        'surat_pengajuan_id',
        'file_path',
        'nama_file',
        'ukuran_file',
        'tipe_file',
    ];

    public function suratPengajuan()
    {
        return $this->belongsTo(SuratPengajuan::class, 'surat_pengajuan_id');
    }
}
