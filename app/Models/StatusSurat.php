<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusSurat extends Model
{
    public $timestamps = false; // karena kita menggunakan kolom tanggal_update manual

    protected $fillable = [
        'surat_pengajuan_id',
        'status',
        'keterangan',
        'updated_by',
        'tanggal_update',
    ];

    protected $casts = [
        'tanggal_update' => 'datetime',
    ];

    public function suratPengajuan()
    {
        return $this->belongsTo(SuratPengajuan::class, 'surat_pengajuan_id');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
