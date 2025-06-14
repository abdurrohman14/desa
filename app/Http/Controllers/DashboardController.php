<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SuratPengajuan;

class DashboardController extends Controller
{
    public function admin()
    {
        $totalPenduduk = User::where('role', '!=', 'admin')->count();
        $suratPengajuan = SuratPengajuan::count();
        return view('partials.adminDashboard', [
            'title' => 'Dashboard Admin',
            'totalPenduduk' => $totalPenduduk,
            'suratPengajuan' => $suratPengajuan
        ]);
    }
    public function warga()
    {
        return view('partials.lp.main', [
            // 'title' => 'Dashboard Warga',
        ]);
    }
}
