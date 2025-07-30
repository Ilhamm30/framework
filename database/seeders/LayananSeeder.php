<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Layanan;

class LayananSeeder extends Seeder
{
    public function run(): void
    {
        // Create layanans if not exists
        $layanans = [
            [
                'nama' => 'Cukur Biasa',
                'deskripsi' => 'Layanan potong rambut standar.',
                'harga' => 30000,
                'status' => 'aktif',
            ],
            [
                'nama' => 'Cukur + Cuci',
                'deskripsi' => 'Potong rambut dan cuci rambut.',
                'harga' => 50000,
                'status' => 'aktif',
            ],
            [
                'nama' => 'Cukur + Styling',
                'deskripsi' => 'Potong rambut dan styling dengan pomade.',
                'harga' => 60000,
                'status' => 'aktif',
            ]
        ];

        foreach ($layanans as $layananData) {
            Layanan::firstOrCreate(
                ['nama' => $layananData['nama']],
                $layananData
            );
        }
    }
}
