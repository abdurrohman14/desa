<?php

namespace App\Http\Controllers\Warga;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class WargaProfileController extends Controller
{
    public function edit(Request $request)
    {
        $user = $request->user();

        return view('warga.profile.index', [
            'title' => 'Profile',
            'user' => $user,
            'profile' => [
                'nik' => $user->nik,
                'no_kk' => $user->no_kk,
                'no_hp' => $user->no_hp,
                'alamat' => $user->alamat,
                'rt' => $user->rt,
                'rw' => $user->rw,
                'kelurahan' => $user->kelurahan,
                'kecamatan' => $user->kecamatan,
                'kabupaten' => $user->kabupaten,
                'provinsi' => $user->provinsi,
                'kode_pos' => $user->kode_pos,
                'tempat_lahir' => $user->tempat_lahir,
                'tanggal_lahir' => $user->tanggal_lahir,
                'jenis_kelamin' => $user->jenis_kelamin,
                'agama' => $user->agama,
                'pekerjaan' => $user->pekerjaan,
                'status_perkawinan' => $user->status_perkawinan,
                'umur' => $user->umur,
                'foto' => $user->foto ?? 'default-profile.jpg',
                'nama' => $user->name,
                'email' => $user->email,
                'pendidikan_terakhir' => $user->pendidikan_terakhir,
                'kewarganegaraan' => $user->kewarganegaraan
            ]
        ]);
    }

    public function update(Request $request)
    {
        try {
            $user = $request->user();

            $validated = $request->validate([
                'no_kk' => 'required|string',
                'no_hp' => 'required|string|max:15',
                'alamat' => 'required|string|max:255',
                'rt' => 'required|string|max:5',
                'rw' => 'required|string|max:5',
                'kode_pos' => 'required|string|max:10',
                'pekerjaan' => 'required|string|max:100',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'kelurahan' => 'required|string',
                'kecamatan' => 'required|string',
                'kabupaten' => 'required|string',
                'provinsi' => 'required|string',
                'tempat_lahir' => 'required|string',
                'tanggal_lahir' => 'required|date',
                'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
                'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu',
                'status_perkawinan' => 'required|in:Belum Kawin,Kawin,Cerai Mati,Cerai Hidup',
                'umur' => 'required|integer',
                'pendidikan_terakhir' => 'required|string',
                'kewarganegaraan' => 'required|string'
            ]);

            if ($request->hasFile('foto')) {
                // Hapus foto lama
                Storage::delete('profiles/' . $user->foto);

                // Upload foto baru
                $image = $request->file('foto');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('profiles', $imageName, 'public');
                $validated['foto'] = $imageName;
            }

            $user->update($validated);

            return redirect()->route('warga.profile')->with('success', 'Profile updated successfully!');
        } catch (\Throwable $th) {
            return redirect()->route('warga.profile')->with('error', $th->getMessage());
        }
    }
}
