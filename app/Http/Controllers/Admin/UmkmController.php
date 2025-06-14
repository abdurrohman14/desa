<?php

namespace App\Http\Controllers\Admin;

use App\Models\Umkm;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UmkmController extends Controller
{
    public function index() {
        $umkms = Umkm::with('kategori')->get();
        return view('admin.umkm.index', [
            'umkms' => $umkms,
            'title' => 'UMKM',
        ]);
    }

    public function create() {
        $kategoris = Kategori::all();
        return view('admin.umkm.create', [
            'kategoris' => $kategoris,
            'title' => 'Tambah UMKM',
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'nama' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // upload gambar
            if ($request->hasFile('gambar')) {
                $image = $request->file('gambar');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('umkm_images', $imageName, 'public');
                $validateData['gambar'] = $imageName;
            }

        Umkm::create([
            'kategori_id' => $request->kategori_id,
            'nama' => $request->nama,
            'pemilik' => $request->pemilik,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imageName,
        ]);

        return redirect()->route('admin.umkm.index')->with('success', 'UMKM created successfully.');
    }

    public function edit($id) {
        $umkm = Umkm::findOrFail($id);
        $kategoris = Kategori::all();
        return view('admin.umkm.edit', [
            'umkm' => $umkm,
            'kategoris' => $kategoris,
            'title' => 'Edit UMKM',
        ]);
    }

    public function update(Request $request, $id) {
        $umkm = Umkm::findOrFail($id);
        $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'nama' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle upload gambar baru
            if ($request->hasFile('gambar')) {
                // Hapus foto lama
                Storage::delete('umkm_images/' . $umkm->gambar);

                // Upload foto baru
                $image = $request->file('gambar');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('umkm_images', $imageName, 'public');
                $validateData['gambar'] = $imageName;
            }

        $umkm->update($request->all());

        return redirect()->route('admin.umkm.index')->with('success', 'UMKM updated successfully.');
    }

    public function destroy($id) {
        $umkm = Umkm::findOrFail($id);
        $umkm->delete();
        return redirect()->route('admin.umkm.index')->with('success', 'UMKM deleted successfully.');
    }
}
