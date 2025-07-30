<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProfileController,
    BarberController,
    LayananController,
    BookingController,
    TransaksiController,
    AdminDashboardController,
    ManajerDashboardController,
    PelangganDashboardController,
    PemesananLangsungController,
    AntrianController
};

Route::get('/', fn () => view('welcome'));

// Setelah login, redirect berdasarkan role
Route::get('/redirect-role', function () {
    $role = auth()->user()->role;

    return match ($role) {
        'admin' => redirect()->route('admin.dashboard'),
        'manajer' => redirect()->route('manajer.dashboard'),
        'pelanggan' => redirect()->route('pelanggan.dashboard'),
        default => abort(403, 'Role tidak valid.'),
    };
})->middleware('auth');

// Default dashboard dari Laravel Breeze (tidak dipakai jika pakai redirect-role)
Route::get('/dashboard', fn () => redirect('/redirect-role'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Akun & profil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ============================
// 🔐 ADMIN ROUTES
// ============================
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard-data', [AdminDashboardController::class, 'getDashboardData'])->name('dashboard.data');
        Route::resource('barbers', BarberController::class);
        Route::resource('layanans', LayananController::class);
    });

// ============================
// 🔐 MANAJER ROUTES
// ============================
Route::middleware(['auth', 'role:manajer'])
    ->prefix('manajer')
    ->name('manajer.')
    ->group(function () {
        Route::get('/', [ManajerDashboardController::class, 'index'])->name('dashboard');
        Route::resource('transaksis', TransaksiController::class);
    });

// ============================
// 🔐 PELANGGAN ROUTES
// ============================
Route::middleware(['auth', 'role:pelanggan'])
    ->prefix('pelanggan')
    ->name('pelanggan.')
    ->group(function () {
        Route::get('/', [PelangganDashboardController::class, 'index'])->name('dashboard');
        Route::resource('bookings', BookingController::class);
        Route::resource('pemesanan-langsung', PemesananLangsungController::class);
        Route::patch('pemesanan-langsung/{pemesananLangsung}/status', [PemesananLangsungController::class, 'updateStatus'])->name('pemesanan-langsung.update-status');
    });

// ============================
// 🔐 ANTRIAN ROUTES (Untuk semua user)
// ============================
Route::prefix('antrian')->name('antrian.')->group(function () {
    Route::get('/', [AntrianController::class, 'index'])->name('index');
    // Tambahkan rute ini untuk menampilkan form ambil antrian
    Route::get('/create', [AntrianController::class, 'create'])->name('create'); // <--- PASTIKAN INI ADA
    Route::post('/ambil', [AntrianController::class, 'ambilAntrian'])->name('ambil')->middleware('auth');
    Route::patch('/{antrian}/status', [AntrianController::class, 'updateStatus'])->name('update-status')->middleware('auth');
    Route::patch('/{antrian}/panggil', [AntrianController::class, 'panggilAntrian'])->name('panggil')->middleware(['auth', 'role:admin,manajer']);
    Route::patch('/{antrian}/mulai', [AntrianController::class, 'mulaiProses'])->name('mulai')->middleware(['auth', 'role:admin,manajer']);
    Route::patch('/{antrian}/selesai', [AntrianController::class, 'selesai'])->name('selesai')->middleware(['auth', 'role:admin,manajer']);
});

require __DIR__.'/auth.php';
