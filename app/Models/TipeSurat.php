<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipeSurat extends Model
{
    protected $fillable = [
        'kode_surat',
        'nama',
        'deskripsi',
        'template_view'
    ];

    public function pengajuans()
    {
        return $this->hasMany(SuratPengajuan::class, 'surat_jenis_id');
    }
}
