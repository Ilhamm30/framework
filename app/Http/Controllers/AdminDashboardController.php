<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use App\Models\Layanan;
use App\Models\Booking;
use App\Models\Transaksi;
use App\Models\PemesananLangsung;
use App\Models\Antrian;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        try {
            // Statistik dasar
            $totalBarber = Barber::count();
            $totalLayanan = Layanan::count();
            $bookingHariIni = Booking::whereDate('created_at', now()->toDateString())->count();
            $totalPendapatan = Transaksi::whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->sum('total');

            // Statistik tambahan
            $barberAktif = Barber::active()->count();
            $layananAktif = Layanan::active()->count();
            $bookingMingguIni = Booking::whereBetween('created_at', [
                now()->startOfWeek(), 
                now()->endOfWeek()
            ])->count();

            // Statistik pemesanan langsung
            $pemesananLangsungHariIni = PemesananLangsung::whereDate('created_at', now()->toDateString())->count();
            $pemesananLangsungMingguIni = PemesananLangsung::whereBetween('created_at', [
                now()->startOfWeek(), 
                now()->endOfWeek()
            ])->count();

            // Statistik antrian
            $antrianHariIni = Antrian::whereDate('created_at', now()->toDateString())->count();
            $antrianSelesaiHariIni = Antrian::whereDate('created_at', now()->toDateString())
                ->where('status', 'selesai')
                ->count();

            // Pendapatan minggu ini
            $pendapatanMingguIni = Transaksi::whereBetween('created_at', [
                now()->startOfWeek(), 
                now()->endOfWeek()
            ])->sum('total');

            // Pendapatan bulan lalu
            $pendapatanBulanLalu = Transaksi::whereMonth('created_at', now()->subMonth()->month)
                ->whereYear('created_at', now()->subMonth()->year)
                ->sum('total');

            // Persentase pertumbuhan
            $pertumbuhanPendapatan = $pendapatanBulanLalu > 0 
                ? (($totalPendapatan - $pendapatanBulanLalu) / $pendapatanBulanLalu) * 100 
                : 0;

            // Booking terbaru (5 terakhir)
            $bookingTerbaru = Booking::with(['user', 'layanan', 'barber'])
                ->latest()
                ->take(5)
                ->get();

            // Transaksi terbaru (5 terakhir)
            $transaksiTerbaru = Transaksi::with(['user', 'booking'])
                ->latest()
                ->take(5)
                ->get();

            // Statistik per jam hari ini
            $statistikPerJam = Booking::selectRaw('HOUR(created_at) as jam, COUNT(*) as total')
                ->whereDate('created_at', now()->toDateString())
                ->groupBy('jam')
                ->orderBy('jam')
                ->get();

            return view('admin.dashboard', compact(
                'totalBarber', 
                'totalLayanan', 
                'bookingHariIni', 
                'totalPendapatan',
                'barberAktif',
                'layananAktif',
                'bookingMingguIni',
                'pemesananLangsungHariIni',
                'pemesananLangsungMingguIni',
                'antrianHariIni',
                'antrianSelesaiHariIni',
                'pendapatanMingguIni',
                'pendapatanBulanLalu',
                'pertumbuhanPendapatan',
                'bookingTerbaru',
                'transaksiTerbaru',
                'statistikPerJam'
            ));

        } catch (\Exception $e) {
            \Log::error('Error in AdminDashboardController: ' . $e->getMessage());
            
            return view('admin.dashboard', [
                'totalBarber' => 0,
                'totalLayanan' => 0,
                'bookingHariIni' => 0,
                'totalPendapatan' => 0,
                'barberAktif' => 0,
                'layananAktif' => 0,
                'bookingMingguIni' => 0,
                'pemesananLangsungHariIni' => 0,
                'pemesananLangsungMingguIni' => 0,
                'antrianHariIni' => 0,
                'antrianSelesaiHariIni' => 0,
                'pendapatanMingguIni' => 0,
                'pendapatanBulanLalu' => 0,
                'pertumbuhanPendapatan' => 0,
                'bookingTerbaru' => collect(),
                'transaksiTerbaru' => collect(),
                'statistikPerJam' => collect(),
                'error' => 'Terjadi kesalahan saat memuat data dashboard. Silakan coba lagi.'
            ]);
        }
    }

    /**
     * Get dashboard data for AJAX requests
     */
    public function getDashboardData()
    {
        try {
            $data = [
                'totalBarber' => Barber::count(),
                'totalLayanan' => Layanan::count(),
                'bookingHariIni' => Booking::whereDate('created_at', now()->toDateString())->count(),
                'totalPendapatan' => Transaksi::whereMonth('created_at', now()->month)
                    ->whereYear('created_at', now()->year)
                    ->sum('total'),
                'barberAktif' => Barber::active()->count(),
                'layananAktif' => Layanan::active()->count(),
                'bookingMingguIni' => Booking::whereBetween('created_at', [
                    now()->startOfWeek(), 
                    now()->endOfWeek()
                ])->count(),
            ];

            return response()->json([
                'success' => true,
                'data' => $data
            ]);

        } catch (\Exception $e) {
            \Log::error('Error in getDashboardData: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat memuat data dashboard.'
            ], 500);
        }
    }
}
