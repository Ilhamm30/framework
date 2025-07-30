<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Barber;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $services = Service::latest()->take(3)->get(); // Ambil 3 layanan terbaru
            $barbers = Barber::latest()->take(3)->get();   // Ambil 3 tukang cukur terbaru
            
            return view('home', compact('services', 'barbers'));
        } catch (\Exception $e) {
            // Jika ada error, kirim array kosong
            return view('home', [
                'services' => collect(),
                'barbers' => collect()
            ]);
        }
    }
}