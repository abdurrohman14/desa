<?php

namespace App\Http\Controllers\Admin;

use App\Models\Keluarga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KeluargaController extends Controller
{
    public function index()
    {
        $keluargas = Keluarga::where('user_id', auth()->id())->get();
        return view('admin.keluarga.index', [
            'title' => 'Data Keluarga',
            'keluargas' => $keluargas
        ]);
    }

    public function create()
    {
        return view('admin.keluarga.create', [
            'title' => 'Tambah Anggota Keluarga'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'nullable|string|max:255',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'nullable|in:Islam,Kristen,Katholik,Buddha,Hindu,KongHucu',
            'pendidikan' => 'nullable|string|max:255',
            'pekerjaan' => 'nullable|string|max:255',
            'status_hubungan' => 'required|in:Suami,Istri,Anak,Orang Tua,Saudara',
        ]);

        Keluarga::create([
            'user_id' => auth()->id(),
            'nama' => $request->nama,
            'nik' => $request->nik,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'pendidikan' => $request->pendidikan,
            'pekerjaan' => $request->pekerjaan,
            'status_hubungan' => $request->status_hubungan,
        ]);

        return redirect()->route('admin.keluarga.index')->with('success', 'Data keluarga berhasil ditambahkan.');
    }
}
