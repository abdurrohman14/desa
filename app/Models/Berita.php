<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'judul',
        'isi',
        'gambar',
        'kategori_id',
        'slug',
        'status',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
