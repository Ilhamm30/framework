<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Booking;
use App\Models\PemesananLangsung;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ManajerDashboardController extends Controller
{
    public function index()
    {
        try {
            $totalTransaksi = Transaksi::count();
            $totalPendapatan = Transaksi::sum('total');
            $bookingMingguIni = Booking::whereBetween('created_at', [
                now()->startOfWeek(), now()->endOfWeek()
            ])->count();

            // Statistik tambahan
            $pendapatanHariIni = Transaksi::whereDate('created_at', today())->sum('total');
            $pendapatanMingguIni = Transaksi::whereBetween('created_at', [
                now()->startOfWeek(), now()->endOfWeek()
            ])->sum('total');
            
            $pemesananLangsungHariIni = PemesananLangsung::whereDate('created_at', today())->count();
            $transaksiHariIni = Transaksi::whereDate('created_at', today())->count();

            // Transaksi terbaru
            $transaksiTerbaru = Transaksi::with(['user', 'pemesananLangsung'])
                ->latest()
                ->take(5)
                ->get();

            return view('manajer.dashboard', compact(
                'totalTransaksi',
                'totalPendapatan',
                'bookingMingguIni',
                'pendapatanHariIni',
                'pendapatanMingguIni',
                'pemesananLangsungHariIni',
                'transaksiHariIni',
                'transaksiTerbaru'
            ));

        } catch (\Exception $e) {
            return view('manajer.dashboard', [
                'totalTransaksi' => 0,
                'totalPendapatan' => 0,
                'bookingMingguIni' => 0,
                'pendapatanHariIni' => 0,
                'pendapatanMingguIni' => 0,
                'pemesananLangsungHariIni' => 0,
                'transaksiHariIni' => 0,
                'transaksiTerbaru' => collect(),
                'error' => 'Terjadi kesalahan saat memuat data dashboard.'
            ]);
        }
    }
}
