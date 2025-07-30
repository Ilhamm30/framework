<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Booking;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with(['booking', 'user'])
            ->latest()
            ->get();
        return view('transaksis.index', compact('transaksis'));
    }

    public function create()
    {
        $bookings = Booking::with(['user', 'layanan', 'barber'])
            ->whereDoesntHave('transaksi')
            ->get();
        return view('transaksis.create', compact('bookings'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'total' => 'required|numeric|min:0',
            'metode_bayar' => 'required|in:cash,qris,transfer',
            'status' => 'required|in:pending,selesai,dibatalkan',
        ]);

        // Get booking to get user_id
        $booking = Booking::findOrFail($validated['booking_id']);
        $validated['user_id'] = $booking->user_id;

        // Check if booking already has transaction
        if ($booking->transaksi) {
            return back()->withErrors(['booking_id' => 'Booking ini sudah memiliki transaksi.'])->withInput();
        }

        Transaksi::create($validated);
        return redirect()->route('manajer.transaksis.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function show(Transaksi $transaksi)
    {
        $transaksi->load(['booking.user', 'booking.layanan', 'booking.barber']);
        return view('transaksis.show', compact('transaksi'));
    }

    public function edit(Transaksi $transaksi)
    {
        $bookings = Booking::with(['user', 'layanan', 'barber'])
            ->whereDoesntHave('transaksi')
            ->orWhere('id', $transaksi->booking_id)
            ->get();
        return view('transaksis.edit', compact('transaksi', 'bookings'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'total' => 'required|numeric|min:0',
            'metode_bayar' => 'required|in:cash,qris,transfer',
            'status' => 'required|in:pending,selesai,dibatalkan',
        ]);

        // Get booking to get user_id
        $booking = Booking::findOrFail($validated['booking_id']);
        $validated['user_id'] = $booking->user_id;

        // Check if booking already has transaction (except current transaction)
        if ($booking->transaksi && $booking->transaksi->id !== $transaksi->id) {
            return back()->withErrors(['booking_id' => 'Booking ini sudah memiliki transaksi.'])->withInput();
        }

        $transaksi->update($validated);
        return redirect()->route('manajer.transaksis.index')->with('success', 'Transaksi diperbarui.');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('manajer.transaksis.index')->with('success', 'Transaksi dihapus.');
    }
}
