<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    public function index() {
        $kategoris = Kategori::all();
        return view('admin.kategori.index', [
            'kategoris' => $kategoris,
            'title' => 'Kategori',
        ]);
    }

    public function create() {
        $tipe = ['berita', 'umkm'];
        return view('admin.kategori.create', [
            'tipe' => $tipe,
            'title' => 'Tambah Kategori',
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tipe' => 'required|in:berita,umkm',
        ]);

        Kategori::create($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori created successfully.');
    }

    public function edit($id) {
        $kategori = Kategori::findOrFail($id);
        $tipe = ['berita', 'umkm'];
        return view('admin.kategori.edit', [
            'kategori' => $kategori,
            'tipe' => $tipe,
            'title' => 'Edit Kategori',
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tipe' => 'required|in:berita,umkm',
        ]);
        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori updated successfully.');
    }
    public function destroy($id) {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori deleted successfully.');
    }
}
