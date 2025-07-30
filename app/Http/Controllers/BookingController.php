<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Layanan;
use App\Models\Barber;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            $bookings = Booking::with(['layanan', 'barber', 'user'])->latest()->get();
        } else {
            $bookings = Booking::where('user_id', auth()->id())
                ->with(['layanan', 'barber'])
                ->latest()
                ->get();
        }

        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $layanans = Layanan::active()->get();
        $barbers = Barber::active()->get();
        return view('bookings.create', compact('layanans', 'barbers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'layanan_id' => 'required|exists:layanans,id',
            'barber_id' => 'required|exists:barbers,id',
            'tanggal' => 'required|date|after_or_equal:today',
            'jam' => ['required', 'regex:/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/'], // ✅ regex sudah ditutup
        ]);

        $layanan = Layanan::find($validated['layanan_id']);
        $barber = Barber::find($validated['barber_id']);

        if (!$layanan || !$layanan->isActive()) {
            return back()->withErrors(['layanan_id' => 'Layanan yang dipilih tidak tersedia.'])->withInput();
        }

        if (!$barber || !$barber->isActive()) {
            return back()->withErrors(['barber_id' => 'Barber yang dipilih tidak tersedia.'])->withInput();
        }

        $validated['user_id'] = auth()->id();
        Booking::create($validated);

        return redirect()->route('pelanggan.bookings.index')->with('success', 'Booking berhasil dibuat.');
    }

    public function show(Booking $booking)
    {
        $this->authorize('view', $booking);
        return view('bookings.show', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        $this->authorize('update', $booking);
        $layanans = Layanan::active()->get();
        $barbers = Barber::active()->get();

        return view('bookings.edit', compact('booking', 'layanans', 'barbers'));
    }

    public function update(Request $request, Booking $booking)
    {
        $this->authorize('update', $booking);

        $validated = $request->validate([
            'layanan_id' => 'required|exists:layanans,id',
            'barber_id' => 'required|exists:barbers,id',
            'tanggal' => 'required|date|after_or_equal:today',
            'jam' => ['required', 'regex:/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/'], // ✅ regex ditutup
        ]);

        $layanan = Layanan::find($validated['layanan_id']);
        $barber = Barber::find($validated['barber_id']);

        if (!$layanan || !$layanan->isActive()) {
            return back()->withErrors(['layanan_id' => 'Layanan yang dipilih tidak tersedia.'])->withInput();
        }

        if (!$barber || !$barber->isActive()) {
            return back()->withErrors(['barber_id' => 'Barber yang dipilih tidak tersedia.'])->withInput();
        }

        $booking->update($validated);
        return redirect()->route('pelanggan.bookings.index')->with('success', 'Booking diperbarui.');
    }

    public function destroy(Booking $booking)
    {
        $this->authorize('delete', $booking);
        $booking->delete();
        return redirect()->route('pelanggan.bookings.index')->with('success', 'Booking dibatalkan.');
    }
}
