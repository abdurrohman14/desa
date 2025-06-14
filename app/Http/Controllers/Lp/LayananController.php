<?php

namespace App\Http\Controllers\Lp;

use App\Models\TipeSurat;
use Illuminate\Http\Request;
use App\Models\SuratPengajuan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LayananController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $suratPengajuans = [];

        if ($user) {
            // Tampilkan hanya pengajuan user yang login
            $suratPengajuans = SuratPengajuan::with('TipeSurat', 'dokumen')
                ->where('user_id', $user->id)
                ->orderByDesc('created_at')
                ->get();
        }
        $jenisSurat = TipeSurat::all();
        return view('lp.layanan', [
            'title' => 'Layanan',
            'suratPengajuans' => $suratPengajuans,
            'jenisSurat' => $jenisSurat
        ]);
    }

    public function create()
    {
        $jenisSurat = TipeSurat::all();

        return view('lp.layanan', [
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

            return redirect()->route('lp.layanan')->with('success', 'Pengajuan surat berhasil dibuat.');
        } catch (\Throwable $th) {
            return redirect()->route('lp.layanan')->with('error', $th->getMessage());
        }
    }
}
