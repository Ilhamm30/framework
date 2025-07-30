<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'name' => 'Potong Rambut Pria',
            'description' => 'Potong rambut gaya klasik atau modern dengan sentuhan akhir.',
            'price' => 50000,
            'image' => 'services/potong-rambut.jpg', // Pastikan gambar ini ada di storage/app/public/services
        ]);

        Service::create([
            'name' => 'Potong & Cuci',
            'description' => 'Potong rambut diikuti dengan keramas dan pijat kepala.',
            'price' => 75000,
            'image' => 'services/potong-cuci.jpg',
        ]);

        Service::create([
            'name' => 'Perawatan Jenggot',
            'description' => 'Perapian dan perawatan jenggot profesional.',
            'price' => 40000,
            'image' => 'services/jenggot.jpg',
        ]);
    }
}