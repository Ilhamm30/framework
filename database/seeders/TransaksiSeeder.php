<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaksi;

class TransaksiSeeder extends Seeder
{
    public function run(): void
    {
        Transaksi::insert([
            [
                'booking_id' => 1,
                'total' => 30000,
                'metode_bayar' => 'cash',
                'status' => 'lunas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'booking_id' => 2,
                'total' => 50000,
                'metode_bayar' => 'qris',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
