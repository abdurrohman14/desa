<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'nik',
        'no_kk',
        'no_hp',
        'alamat',
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kode_pos',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'status_perkawinan',
        'umur',
        'foto',
        'pendidikan_terakhir',
        'kewarganegaraan'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getTanggalLahirFormattedAttribute()
    {
        return Carbon::parse($this->tanggal_lahir)->locale('id')->translatedFormat('d F Y');
    }

    public function isAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isWarga()
    {
        return $this->role === self::ROLE_WARGA;
    }

    const ROLE_ADMIN = 'admin';
    const ROLE_WARGA = 'warga';

    public function suratPengajuans()
    {
        return $this->hasMany(SuratPengajuan::class, 'user_id');
    }

    public function keluargas()
    {
        return $this->hasMany(Keluarga::class);
    }

    public function suratLogUpdates()
    {
        return $this->hasMany(StatusSurat::class, 'updated_by');
    }
}
