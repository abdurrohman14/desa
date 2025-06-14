<?php

namespace App\Http\Controllers\Warga;

use App\Models\TipeSurat;
use Illuminate\Http\Request;
use App\Models\SuratPengajuan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SuratPengajuanController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Tampilkan hanya pengajuan user yang login
        $suratPengajuans = SuratPengajuan::with('TipeSurat', 'dokumen')
            ->where('user_id', $user->id)
            ->orderByDesc('created_at')
            ->get();

        return view('warga.surat.index', [
            'suratPengajuans' => $suratPengajuans,
            'title' => 'Surat Pengajuan'
        ]);
    }

    // Form ajukan surat baru
    public function create()
    {
        $jenisSurat = TipeSurat::all();

        return view('warga.surat.create', [
            'jenisSurat' => $jenisSurat,
            'title' => 'Ajukan Surat'
        ]);
    }

    // Simpan pengajuan surat baru
    public function store(Request $request)
    {
        try {
            $request->validate([
                'tipe_surat_id' => 'required|exists:tipe_surats,id',
                'data_pengajuan' => 'required|array',
            ]);

            $user = Auth::user();

            $pengajuan = SuratPengajuan::create([
                'user_id' => $user->id,
                'tipe_surat_id' => $request->tipe_surat_id,
                'data_pengajuan' => $request->data_pengajuan,
                'status' => 'pending',
                'tanggal_pengajuan' => now(),
            ]);

            return redirect()->route('warga.surat.index')->with('success', 'Pengajuan surat berhasil dibuat.');
        } catch (\Throwable $th) {
            return redirect()->route('warga.surat.create')->with('error', $th->getMessage());
        }
    }

    // Detail pengajuan dan link download surat jika sudah selesai
    public function show($id)
    {
        $user = Auth::user();

        $pengajuan = SuratPengajuan::with('TipeSurat', 'dokumen')
            ->where('user_id', $user->id)
            ->findOrFail($id);

        return view('warga.surat.show', [
            'title' => 'Detail Surat',
            'pengajuan' => $pengajuan
        ]);
    }
}
