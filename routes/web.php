<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UmkmController;
use App\Http\Controllers\Admin\SuratController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\KeluargaController;
use App\Http\Controllers\admin\PendudukController;
use App\Http\Controllers\Warga\WargaProfileController;
use App\Http\Controllers\Admin\AdminFeedbackController;
use App\Http\Controllers\Warga\SuratPengajuanController;

// Route::get('/', function () {
//     return view('auth.login');
// });

// Route::get('/dashboard', function () {
//     return view('partials.adminDashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/lp.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'admin'])->name('admin.dashboard');

    // Kategori
    Route::prefix('kategori')->group(function () {
        Route::get('/', [KategoriController::class, 'index'])->name('kategori.index');
        Route::get('/create', [KategoriController::class, 'create'])->name('kategori.create');
        Route::post('/', [KategoriController::class, 'store'])->name('kategori.store');
        Route::get('/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
        Route::put('/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
        Route::delete('/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
    });

    // Berita
    Route::prefix('berita')->group(function () {
        Route::get('/', [BeritaController::class, 'index'])->name('admin.berita.index');
        Route::get('/create', [BeritaController::class, 'create'])->name('admin.berita.create');
        Route::post('/', [BeritaController::class, 'store'])->name('admin.berita.store');
        Route::get('/{id}/edit', [BeritaController::class, 'edit'])->name('admin.berita.edit');
        Route::put('/{id}/update', [BeritaController::class, 'update'])->name('admin.berita.update');
        Route::delete('/{id}/delete', [BeritaController::class, 'destroy'])->name('admin.berita.destroy');
    });

    // umkm
    Route::prefix('umkm')->group(function () {
        Route::get('/', [UmkmController::class, 'index'])->name('admin.umkm.index');
        Route::get('/create', [UmkmController::class, 'create'])->name('admin.umkm.create');
        Route::post('/', [UmkmController::class, 'store'])->name('admin.umkm.store');
        Route::get('/{id}/edit', [UmkmController::class, 'edit'])->name('admin.umkm.edit');
        Route::put('/{id}/update', [UmkmController::class, 'update'])->name('admin.umkm.update');
        Route::delete('/{id}/delete', [UmkmController::class, 'destroy'])->name('admin.umkm.destroy');
    });

    // Galeri
    Route::prefix('galeri')->group(function() {
        Route::get('/', [GaleriController::class, 'index'])->name('admin.galeri.index');
        Route::get('/create', [GaleriController::class, 'create'])->name('admin.galeri.create');
        Route::post('/store', [GaleriController::class, 'store'])->name('admin.galeri.store');
        Route::get('/edit/{id}', [GaleriController::class, 'edit'])->name('admin.galeri.edit');
        Route::put('/update/{id}', [GaleriCOntroller::class, 'update'])->name('admin.galeri.update');
        Route::delete('/{id}/delete/', [GaleriController::class, 'destroy'])->name('admin.galeri.delete');
    });

    // Penduduk
    Route::prefix('penduduk')->group(function () {
        Route::get('/', [PendudukController::class, 'index'])->name('admin.penduduk.index');
        Route::get('/detail/{id}', [PendudukController::class, 'detail'])->name('admin.penduduk.detail');
    });

    // Keluarga
    Route::prefix('keluarga')->group(function () {
        Route::get('/', [KeluargaController::class, 'index'])->name('admin.keluarga.index');
        Route::get('/create',[KeluargaController::class, 'create'])->name('admin.keluarga.create');
        Route::post('/store',[KeluargaController::class, 'store'])->name('admin.keluarga.store');
        Route::get('/detail/{id}', [KeluargaController::class, 'detail'])->name('admin.keluarga.detail');
    });

    // Surat Menyurat
    Route::prefix('surat')->group(function () {
        Route::get('/', [SuratController::class, 'index'])->name('admin.surat.index');
        Route::get('/{id}', [SuratController::class, 'show'])->name('admin.surat.show');
        Route::post('/{id}/status', [SuratController::class, 'updateStatus'])->name('admin.surat.updateStatus');
        Route::get('/generate/{id}', [SuratController::class, 'generatePdf'])->name('admin.surat.generate');
    });

    // Feedback
    Route::prefix('feedback')->group(function() {
        Route::get('/', [AdminFeedbackController::class, 'index'])->name('admin.feedback.index');
    });
});

Route::middleware(['auth', 'role:warga'])->group(function () {
    Route::get('/warga', [DashboardController::class, 'warga'])->name('warga.dashboard');

    // profile
    Route::prefix('profile')->group(function () {
        Route::get('/', [WargaProfileController::class, 'edit'])->name('warga.profile');
        Route::put('/update', [WargaProfileController::class, 'update'])->name('warga.update.profile');
    });

    Route::prefix('surat-pengajuan')->group(function () {
        Route::get('/', [SuratPengajuanController::class, 'index'])->name('warga.surat.index');

        // Form ajukan surat
        Route::get('/create', [SuratPengajuanController::class, 'create'])->name('warga.surat.create');
        Route::post('/store', [SuratPengajuanController::class, 'store'])->name('warga.surat.store');

        // Detail dan download surat
        Route::get('/download/{id}', [SuratPengajuanController::class, 'show'])->name('warga.surat.show');
    });
});
