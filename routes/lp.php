<?php

use App\Http\Controllers\Lp\FeedbackController;
use App\Http\Controllers\Lp\LayananController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Lp\LpController;
use App\Http\Controllers\Lp\LpBeritaController;
use App\Http\Controllers\Lp\LpGaleriController;
use App\Http\Controllers\Lp\LpUmkmController;

// Landing Page
Route::get('/', [LpController::class, 'index'])->name('lp.index');
// Berita
Route::prefix('landing-berita')->group(function () {
    Route::get('/', [LpBeritaController::class, 'index'])->name('lp.berita.index');
    Route::get('/search', [LpBeritaController::class, 'index'])->name('lp.berita.search');
    Route::get('/{slug}', [LpBeritaController::class, 'show'])->name('lp.berita.show');
});
// Umkm
Route::prefix('landing-umkm')->group(function () {
    Route::get('/', [LpUmkmController::class, 'index'])->name('lp.umkm.index');
    Route::get('/search', [LpUmkmController::class, 'index'])->name('lp.umkm.search');
    Route::get('/{id}', [LpUmkmController::class, 'show'])->name('lp.umkm.show');
});
// Layanan
Route::prefix('layanan')->group(function () {
    Route::get('/', [LayananController::class, 'index'])->name('lp.layanan');
});
// Galeri
Route::prefix('landing-galeri')->group(function() {
    Route::get('/', [LpGaleriController::class, 'index'])->name('lp.galeri');
});

// Feedback
Route::post('/', [FeedbackController::class, 'store'])->name('lp.feedback');
// Profil Desa
Route::get('/profile-desa', function () {
    return view('lp.profile', [
        'title' => 'Profile Desa',
    ]);
})->name('profile');
