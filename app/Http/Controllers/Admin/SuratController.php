<?php

namespace App\Http\Controllers\Admin;

use App\Models\StatusSurat;
use Illuminate\Support\Str;
use App\Models\SuratDokumen;
use Illuminate\Http\Request;
use App\Models\SuratPengajuan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class SuratController extends Controller
{
    public function index()
    {
        $pengajuans = SuratPengajuan::with('user', 'TipeSurat')->latest()->get();
        return view('admin.surat.index', [
            'title' => 'Surat Menyurat',
            'pengajuans' => $pengajuans
        ]);
    }

    public function show($id)
    {
        $pengajuan = SuratPengajuan::with('user', 'TipeSurat')->findOrFail($id);
        return view('admin.surat.show', [
            'title' => 'Surat Pengajuan',
            'pengajuan' => $pengajuan
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:selesai,ditolak',
        ]);

        $pengajuan = SuratPengajuan::findOrFail($id);
        $pengajuan->status = $request->status;
        $pengajuan->save();

        return redirect()->route('admin.surat.index')->with('success', 'Status berhasil diperbarui');
    }

    public function generatePdf($id)
    {
        $pengajuan = SuratPengajuan::with(['TipeSurat', 'user'])->findOrFail($id);
        $data = $pengajuan->data_pengajuan;
        $template = $pengajuan->tipeSurat->template_view ?? 'admin.surat.template.sktm';

        $kodeSurat = $pengajuan->tipeSurat->kode_surat ?? 'XXX';
        $bulan = now()->format('m');
        $tahun = now()->format('Y');

        // Hitung nomor urut berdasarkan surat sejenis di bulan & tahun ini
        $lastSurat = SuratPengajuan::where('tipe_surat_id', $pengajuan->tipe_surat_id)
            ->whereYear('tanggal_selesai', $tahun)
            ->whereMonth('tanggal_selesai', now()->format('m'))
            ->whereNotNull('nomor_surat')
            ->latest('tanggal_selesai')
            ->first();

        $lastNumber = 0;
        if ($lastSurat && preg_match('/^(\d{3})\/' . preg_quote($kodeSurat, '/') . '\/' . $bulan . '\/' . $tahun . '$/', $lastSurat->nomor_surat, $matches)) {
            $lastNumber = (int)$matches[1];
        }

        $nextNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        $nomorSurat = "{$nextNumber}/{$kodeSurat}/{$bulan}/{$tahun}";

        $ttd = [
            'nama' => auth()->user()->name,
            'nip' => '19780101 200012 1 002',
            'jabatan' => 'Kepala Desa',
        ];

        $tanggal = now()->translatedFormat('d F Y');
        $desa = 'DESA BULUSARI';
        $kecamatan = 'KECAMATAN KALIPURO';
        $kabupaten = 'KABUPATEN BANYUWANGI';
        $kode_pos = '68455';

        $pdf = PDF::loadView($template, compact('data', 'tanggal', 'desa', 'kecamatan', 'kabupaten', 'kode_pos', 'pengajuan', 'nomorSurat', 'ttd'))
            ->setPaper('A4');

        // $fileName = 'surat-' . $pengajuan->id . '-' . Str::slug($pengajuan->tipeSurat->nama) . '.pdf';
        $userName = Str::slug($pengajuan->user->name);

        $fileName = "{$nomorSurat}_{$userName}_{$pengajuan->tipeSurat->nama}.pdf";
        $fileName = str_replace('/', '-', $fileName); // ganti slash biar tidak error di nama file
        Storage::disk('public')->put('surat/' . $fileName, $pdf->output());

        SuratDokumen::create([
            'surat_pengajuan_id' => $pengajuan->id,
            'file_path' => 'surat/' . $fileName,
            'nama_file' => $fileName,
            'ukuran_file' => strlen($pdf->output()),
            'tipe_file' => 'application/pdf',
        ]);

        $pengajuan->update([
            'nomor_surat' => $nomorSurat,
            'status' => 'selesai',
            'tanggal_selesai' => now(),
        ]);

        StatusSurat::create([
            'surat_pengajuan_id' => $pengajuan->id,
            'status' => 'selesai',
            'keterangan' => 'Surat telah digenerate oleh admin',
            'updated_by' => auth()->id(),
        ]);

        return response()->download(storage_path('app/public/surat/' . $fileName));
    }
}
