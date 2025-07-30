<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Barber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AntrianController extends Controller
{
    public function index()
    {
        $antrianHariIni = Antrian::whereDate('created_at', today())
            ->with(['user', 'barber'])
            ->orderBy('nomor_antrian')
            ->get();

        $antrianSaya = null;
        if (Auth::check()) {
            $antrianSaya = Antrian::where('user_id', Auth::id())
                ->whereDate('created_at', today())
                ->where('status', '!=', 'selesai')
                ->first();
        }

        $barbers = Barber::active()->get();

        return view('antrian.index', compact('antrianHariIni', 'antrianSaya', 'barbers'));
    }

    public function create()
    {
        $barbers = Barber::active()->get();
        return view('antrian.create', compact('barbers'));
    }

    public function ambilAntrian(Request $request)
    {
        $request->validate([
            'barber_id' => 'required|exists:barbers,id',
        ], [
            'barber_id.required' => 'Pilih barber terlebih dahulu.',
            'barber_id.exists' => 'Barber yang dipilih tidak valid.',
        ]);

        // Cek apakah user sudah mengambil antrian hari ini
        $antrianSudahAda = Antrian::where('user_id', Auth::id())
            ->whereDate('created_at', today())
            ->where('status', '!=', 'selesai')
            ->exists();

        if ($antrianSudahAda) {
            return back()->with('error', 'Anda sudah mengambil antrian hari ini!');
        }

        // Cek apakah barber tersedia
        $barber = Barber::find($request->barber_id);
        if (!$barber || !$barber->isActive()) {
            return back()->with('error', 'Barber tidak tersedia saat ini.');
        }

        try {
            DB::beginTransaction();

            // Ambil nomor antrian berikutnya
            $nomorTerakhir = Antrian::whereDate('created_at', today())
                ->max('nomor_antrian') ?? 0;

            $antrian = Antrian::create([
                'user_id' => Auth::id(),
                'barber_id' => $request->barber_id,
                'nomor_antrian' => $nomorTerakhir + 1,
                'status' => 'menunggu',
            ]);

            DB::commit();

            return redirect()->route('antrian.index')
                ->with('success', "Antrian berhasil diambil! Nomor antrian Anda: {$antrian->nomor_antrian}");

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan saat mengambil antrian. Silakan coba lagi.');
        }
    }

    public function updateStatus(Request $request, Antrian $antrian)
    {
        $request->validate([
            'status' => 'required|in:menunggu,dipanggil,proses,selesai',
        ], [
            'status.required' => 'Status harus dipilih.',
            'status.in' => 'Status tidak valid.',
        ]);

        $antrian->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Status antrian berhasil diperbarui!');
    }

    public function panggilAntrian(Antrian $antrian)
    {
        if ($antrian->status !== 'menunggu') {
            return back()->with('error', 'Antrian ini tidak dapat dipanggil.');
        }

        $antrian->update(['status' => 'dipanggil']);
        
        return back()->with('success', "Antrian nomor {$antrian->nomor_antrian} dipanggil!");
    }

    public function mulaiProses(Antrian $antrian)
    {
        if ($antrian->status !== 'dipanggil') {
            return back()->with('error', 'Antrian ini tidak dapat diproses.');
        }

        $antrian->update(['status' => 'proses']);
        
        return back()->with('success', "Memulai proses untuk antrian nomor {$antrian->nomor_antrian}!");
    }

    public function selesai(Antrian $antrian)
    {
        if ($antrian->status !== 'proses') {
            return back()->with('error', 'Antrian ini tidak dapat diselesaikan.');
        }

        $antrian->update(['status' => 'selesai']);
        
        return back()->with('success', "Antrian nomor {$antrian->nomor_antrian} selesai!");
    }
} 