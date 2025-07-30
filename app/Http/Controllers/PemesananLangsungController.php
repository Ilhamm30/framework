<?php

namespace App\Http\Controllers;

use App\Models\PemesananLangsung;
use App\Models\Layanan;
use App\Models\Barber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemesananLangsungController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pemesananLangsung = PemesananLangsung::where('user_id', $user->id)
            ->with(['layanan', 'barber'])
            ->latest()
            ->paginate(10);

        return view('pemesanan-langsung.index', compact('pemesananLangsung'));
    }

    public function create()
    {
        $layanans = Layanan::active()->get();
        $barbers = Barber::active()->get();
        
        return view('pemesanan-langsung.create', compact('layanans', 'barbers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'layanan_id' => 'required|exists:layanans,id',
            'barber_id' => 'required|exists:barbers,id',
            'metode_bayar' => 'required|in:tunai,transfer,qris',
            'catatan' => 'nullable|string|max:500',
        ]);

        // Cek apakah layanan dan barber masih aktif
        $layanan = Layanan::find($request->layanan_id);
        $barber = Barber::find($request->barber_id);

        if (!$layanan->isActive()) {
            return back()->withErrors(['layanan_id' => 'Layanan yang dipilih tidak tersedia.'])->withInput();
        }

        if (!$barber->isActive()) {
            return back()->withErrors(['barber_id' => 'Barber yang dipilih tidak tersedia.'])->withInput();
        }
        
        $pemesananLangsung = PemesananLangsung::create([
            'user_id' => Auth::id(),
            'layanan_id' => $request->layanan_id,
            'barber_id' => $request->barber_id,
            'total_harga' => $layanan->harga,
            'metode_bayar' => $request->metode_bayar,
            'status' => 'pending',
            'catatan' => $request->catatan,
            'waktu_pemesanan' => now(),
        ]);

        return redirect()->route('pelanggan.pemesanan-langsung.show', $pemesananLangsung)
            ->with('success', 'Pemesanan langsung berhasil dibuat!');
    }

    public function show(PemesananLangsung $pemesananLangsung)
    {
        // Pastikan user hanya bisa melihat pemesanan miliknya
        if ($pemesananLangsung->user_id !== Auth::id()) {
            abort(403);
        }

        return view('pemesanan-langsung.show', compact('pemesananLangsung'));
    }

    public function updateStatus(Request $request, PemesananLangsung $pemesananLangsung)
    {
        $request->validate([
            'status' => 'required|in:pending,proses,selesai,dibatalkan',
        ]);

        $pemesananLangsung->update([
            'status' => $request->status,
            'waktu_selesai' => $request->status === 'selesai' ? now() : null,
        ]);

        return back()->with('success', 'Status pemesanan berhasil diperbarui!');
    }
} 