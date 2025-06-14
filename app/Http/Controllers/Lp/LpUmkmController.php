<?php

namespace App\Http\Controllers\Lp;

use App\Models\Umkm;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LpUmkmController extends Controller
{
    public function index(Request $request)
    {
        $query = Umkm::with('kategori')->latest();
        // Filter kategori
        if ($request->has('kategori')) {
            $query->where('kategori_id', $request->kategori);
        }
        $kategories = Kategori::where('tipe', 'umkm')->get();
        $umkms = $query->paginate(3);
        return view('lp.umkm.lpUmkm', [
            'umkms' => $umkms,
            'kategories' => $kategories,
            'title' => 'UMKM',
        ]);
    }

    public function show($id)
    {
        $umkm = Umkm::findOrFail($id);
        $umkmTerkait = Umkm::where('id', '!=', $umkm->id)
            ->latest()
            ->take(5)
            ->get();
        return view('lp.umkm.lpUmkmDetail', [
            'title' => 'UMKM',
            'umkm' => $umkm,
            'umkmTerkait' => $umkmTerkait,
        ]);
    }
}
