<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class SuratPengajuan extends Model
{
     protected $fillable = [
        'user_id',
        'nomor_surat',
        'tipe_surat_id',
        'data_pengajuan',
        'status',
        'tanggal_pengajuan',
        'tanggal_selesai',
    ];

    protected $casts = [
        'data_pengajuan' => 'array',
        'tanggal_pengajuan' => 'datetime',
        'tanggal_selesai' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function TipeSurat()
    {
        return $this->belongsTo(TipeSurat::class, 'tipe_surat_id');
    }

    public function dokumen()
    {
        return $this->hasOne(SuratDokumen::class, 'surat_pengajuan_id');
    }

    public function logStatus()
    {
        return $this->hasMany(StatusSurat::class, 'surat_pengajuan_id');
    }
}
