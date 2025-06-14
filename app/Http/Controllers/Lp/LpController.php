<?php

namespace App\Http\Controllers\Lp;

use App\Models\Umkm;
use App\Models\User;
use App\Models\Berita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LpController extends Controller
{
    public function index() {
        $penduduk = User::where('role', '!=', 'admin')->count();
        $beritas = Berita::with('kategori')
            ->where('status', 'published')
            ->latest()
            ->take(3)
            ->get();

        $umkms = Umkm::with('kategori')
            ->latest()
            ->take(4)
            ->get();
        return view('partials.lp.main', [
            'title' => 'Desa Bulusari',
            'beritas' => $beritas,
            'umkms' => $umkms,
            'penduduk' => $penduduk
        ]);
    }
}
