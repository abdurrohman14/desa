<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PendudukController extends Controller
{
    public function index() {
        $penduduk = User::where('role', '!=', 'admin')->get();
        return view('admin.penduduk.index', [
            'title' => 'Data Penduduk',
            'penduduk' => $penduduk
        ]);
    }

    public function detail($id) {
        $penduduk = User::findOrFail($id);
        return view('admin.penduduk.detail', [
            'penduduk' => $penduduk
        ]);
    }
}
