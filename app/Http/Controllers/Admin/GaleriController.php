<?php

namespace App\Http\Controllers\Admin;

use App\Models\Galeri;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::all();
        return view('admin.galeri.index', [
            'title' => 'Galeri',
            'galeri' => $galeri
        ]);
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.galeri.create', [
            'title' => 'Tambah Galeri',
            'kategoris' => $kategoris
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'video' => 'nullable|url',
        ]);

        $data = [
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'video' => $request->video,
        ];

        // Jika ada gambar yang di-upload
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('galeri', 'public');
            $data['foto'] = $foto;
        }

        Galeri::create($data);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        $kategoris = Kategori::all();

        return view('admin.galeri.edit', [
            'title' => 'Edit Galeri',
            'galeri' => $galeri,
            'kategoris' => $kategoris
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'video' => 'nullable|url',
        ]);

        $galeri = Galeri::findOrFail($id);

        $data = [
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'video' => $request->video,
        ];

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($galeri->foto && Storage::disk('public')->exists($galeri->foto)) {
                Storage::disk('public')->delete($galeri->foto);
            }

            $foto = $request->file('foto')->store('galeri', 'public');
            $data['foto'] = $foto;
        }

        $galeri->update($data);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        // Hapus gambar dari penyimpanan
        if ($galeri->foto && Storage::disk('public')->exists($galeri->foto)) {
            Storage::disk('public')->delete($galeri->foto);
        }

        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil dihapus.');
    }
}
