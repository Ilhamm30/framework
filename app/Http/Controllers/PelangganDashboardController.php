<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\PemesananLangsung;
use App\Models\Antrian;
use App\Models\User; // Tambahkan ini untuk menghitung total pelanggan
use Illuminate\Support\Facades\Auth;

class PelangganDashboardController extends Controller
{
    public function index()
    {
        try {
            $user = auth()->user();

            $bookingSaya = Booking::where('user_id', $user->id)->count();
            $bookingTerakhir = Booking::where('user_id', $user->id)
                ->with(['layanan', 'barber'])
                ->latest()
                ->first();

            $pemesananLangsungSaya = PemesananLangsung::where('user_id', $user->id)->count();
            $pemesananLangsungTerakhir = PemesananLangsung::where('user_id', $user->id)
                ->with(['layanan', 'barber'])
                ->latest()
                ->first();

            $antrianSaya = Antrian::where('user_id', $user->id)
                ->whereDate('created_at', today())
                ->where('status', '!=', 'selesai')
                ->with('barber') // Sudah benar, memuat relasi barber
                ->first();

            $totalTransaksi = PemesananLangsung::where('user_id', $user->id)->sum('total_harga');

            // Menambahkan total pelanggan untuk kartu keempat
            $totalPelanggan = User::where('role', 'pelanggan')->count(); // Asumsi ada kolom 'role' di tabel users

            // Data tambahan
            $bookingAktif = Booking::where('user_id', $user->id)
                ->where('status', '!=', 'selesai')
                ->with(['layanan', 'barber'])
                ->latest()
                ->take(3)
                ->get();

            $riwayatTransaksi = PemesananLangsung::where('user_id', $user->id)
                ->with(['layanan', 'barber'])
                ->latest()
                ->take(5)
                ->get();

            return view('pelanggan.dashboard', compact(
                'bookingSaya',
                'bookingTerakhir',
                'pemesananLangsungSaya',
                'pemesananLangsungTerakhir',
                'antrianSaya',
                'totalTransaksi',
                'totalPelanggan', // Tambahkan ini
                'bookingAktif',
                'riwayatTransaksi'
            ));

        } catch (\Exception $e) {
            // Log error untuk debugging lebih lanjut
            \Log::error("Error loading customer dashboard: " . $e->getMessage());

            return view('pelanggan.dashboard', [
                'bookingSaya' => 0,
                'bookingTerakhir' => null,
                'pemesananLangsungSaya' => 0,
                'pemesananLangsungTerakhir' => null,
                'antrianSaya' => null,
                'totalTransaksi' => 0,
                'totalPelanggan' => 0, // Tambahkan ini
                'bookingAktif' => collect(),
                'riwayatTransaksi' => collect(),
                'error' => 'Terjadi kesalahan saat memuat data dashboard. Silakan coba lagi.'
            ]);
        }
    }
}