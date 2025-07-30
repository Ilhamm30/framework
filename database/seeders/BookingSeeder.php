<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        Booking::insert([
            [
                'user_id' => 3, // Pelanggan Satu
                'layanan_id' => 1,
                'barber_id' => 1,
                'tanggal' => now()->addDays(1)->format('Y-m-d'),
                'jam' => '10:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'layanan_id' => 2,
                'barber_id' => 2,
                'tanggal' => now()->addDays(2)->format('Y-m-d'),
                'jam' => '13:00',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
