<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $fillable = [
        'kategori_id', 'judul', 'foto', 'video'
    ];

    public function kategori() {
        return $this->belongsTo(Kategori::class);
    }
}
