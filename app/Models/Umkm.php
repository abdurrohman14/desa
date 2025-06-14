<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $fillable = [
        'kategori_id', 'nama', 'pemilik', 'no_hp', 'alamat', 'deskripsi', 'gambar'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
