<?php

namespace App\Http\Controllers\Lp;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'pesan' => 'required|string',
        ]);

        // Simpan ke database
        $feedback = Feedback::create($validated);

        // Kirim email notifikasi ke admin (jika email admin disetel)
        if (env('ADMIN_EMAIL')) {
            $nama = $validated['nama'] ?? 'Anonim';
            $email = $validated['email'] ?? '-';
            $pesan = $validated['pesan'];

            $emailContent = <<<TEXT
                            Pesan Kritik dan Saran Baru:
                            Nama: {$nama}
                            Email: {$email}
                            Pesan: {$pesan}
                            TEXT;
            Mail::raw($emailContent, function ($message) {
                $message->to(env('ADMIN_EMAIL'))
                    ->subject('Pesan Kritik dan Saran Baru');
            });
        }

        return back()->with('success', 'Terima kasih atas kritik dan saran Anda.');
    }
}
