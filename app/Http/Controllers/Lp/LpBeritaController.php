<?php

namespace App\Http\Controllers\Lp;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LpBeritaController extends Controller
{
    public function index(Request $request)
{
    $query = Berita::with('kategori')
                ->where('status', 'published')
                ->latest();

    // Filter pencarian
    if ($request->has('q')) {
        $search = $request->q;
        $query->where(function ($q) use ($search) {
            $q->where('judul', 'like', "%$search%")
              ->orWhere('isi', 'like', "%$search%");
        });
    }

    // Filter kategori
    if ($request->has('kategori')) {
        $query->where('kategori_id', $request->kategori);
    }

    $beritas = $query->paginate(3);
    $kategories = Kategori::where('tipe', 'berita')->get();

    return view('lp.berita.lpBerita', [
        'beritas' => $beritas,
        'kategories' => $kategories,
        'title' => 'Berita',
    ]);
}

    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->where('status', 'published')->firstOrFail();
        $beritaTerkait = Berita::where('id', '!=', $berita->id)
            ->where('status', 'published')
            ->latest()
            ->take(5)
            ->get();

        return view('lp.berita.lpBeritaDetail', [
            'berita' => $berita,
            'beritaTerkait' => $beritaTerkait,
            'title' => 'Berita',
        ]);
    }
}
