<?php

namespace App\Http\Controllers\Admin;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::with('kategori')->get();
        return view('admin.berita.index', [
            'beritas' => $beritas,
            'title' => 'Berita',
        ]);
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.berita.create', [
            'kategoris' => $kategoris,
            'title' => 'Tambah Berita',
        ]);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'judul' => 'required|string|max:255',
                'isi' => 'required|string',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'kategori_id' => 'required|exists:kategoris,id',
                'slug' => 'required|string|max:255|unique:beritas,slug',
                'status' => 'required|in:published,draft',
            ]);

            // upload gambar
            if ($request->hasFile('gambar')) {
                $image = $request->file('gambar');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('berita_images', $imageName, 'public');
                $validateData['gambar'] = $imageName;
            }

            Berita::create([
                'judul' => $request->judul,
                'isi' => $request->isi,
                'gambar' => $imageName,
                'kategori_id' => $request->kategori_id,
                'slug' => $request->slug,
                'status' => $request->status,
            ]);

            return redirect()->route('admin.berita.index')->with('success', 'Berita created successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to create berita: ' . $th->getMessage());
        }
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        if (!$berita) {
            return redirect()->route('admin.berita.index')->with('error', 'Berita not found.');
        }
        $kategoris = Kategori::all();
        return view('admin.berita.edit', [
            'berita' => $berita,
            'kategoris' => $kategoris,
            'title' => 'Edit Berita',
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $berita = Berita::findOrFail($id);
            $request->validate([
                'judul' => 'nullable|string|max:255',
                'isi' => 'nullable|string',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'kategori_id' => 'nullable|exists:kategoris,id',
                'slug' => 'nullable|string|max:255|unique:beritas,slug,' . $berita->id,
                'status' => 'nullable|in:published,draft',
            ]);

            // Handle upload gambar baru
            if ($request->hasFile('gambar')) {
                // Hapus foto lama
                Storage::delete('berita_images/' . $berita->gambar);

                // Upload foto baru
                $image = $request->file('gambar');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('berita_images', $imageName, 'public');
                $validateData['gambar'] = $imageName;
            }

            $berita->update($request->all());

            return redirect()->route('admin.berita.index')->with('success', 'Berita updated successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to update berita: ' . $th->getMessage());
        }
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        // Hapus foto
        Storage::delete('berita_images/' . $berita->gambar);
        $berita->delete();
        return redirect()->route('admin.berita.index')->with('success', 'Berita deleted successfully.');
    }
}
