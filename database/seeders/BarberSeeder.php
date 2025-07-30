<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barber;

class BarberSeeder extends Seeder
{
    public function run(): void
    {
        // Create barbers if not exists
        $barbers = [
            [
                'name' => 'Budi Gunawan',
                'specialty' => 'Fade Cut',
                'bio' => 'Barber profesional dengan pengalaman 10 tahun.',
                'image' => 'budi.jpg',
                'status' => 'aktif',
            ],
            [
                'name' => 'Andi Permana',
                'specialty' => 'Pompadour',
                'bio' => 'Ahli gaya rambut klasik dan modern.',
                'image' => 'andi.jpg',
                'status' => 'aktif',
            ]
        ];

        foreach ($barbers as $barberData) {
            Barber::firstOrCreate(
                ['name' => $barberData['name']],
                $barberData
            );
        }
    }
}
