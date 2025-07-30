<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarberController extends Controller
{
    public function index()
    {
        $barbers = Barber::latest()->get();
        return view('barbers.index', compact('barbers'));
    }

    public function create()
    {
        return view('barbers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        // Konversi status ke lowercase agar konsisten di DB
        $validated['status'] = strtolower($validated['status']);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('barbers', 'public');
        }

        Barber::create($validated);

        return redirect()->route('admin.barbers.index')
            ->with('success', 'Barber berhasil ditambahkan.');
    }

    public function show(Barber $barber)
    {
        return view('barbers.show', compact('barber'));
    }

    public function edit(Barber $barber)
    {
        return view('barbers.edit', compact('barber'));
    }

    public function update(Request $request, Barber $barber)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $validated['status'] = strtolower($validated['status']);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($barber->image && Storage::disk('public')->exists($barber->image)) {
                Storage::disk('public')->delete($barber->image);
            }

            $validated['image'] = $request->file('image')->store('barbers', 'public');
        }

        $barber->update($validated);

        return redirect()->route('admin.barbers.index')
            ->with('success', 'Barber berhasil diperbarui.');
    }

    public function destroy(Barber $barber)
    {
        // Hapus gambar jika ada
        if ($barber->image && Storage::disk('public')->exists($barber->image)) {
            Storage::disk('public')->delete($barber->image);
        }

        $barber->delete();

        return redirect()->route('admin.barbers.index')
            ->with('success', 'Barber berhasil dihapus.');
    }
}
