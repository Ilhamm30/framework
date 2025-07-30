#!/bin/bash

echo "========================================"
echo "   Setup Sistem Manajemen Barbershop"
echo "========================================"
echo ""

echo "1. Installing Composer dependencies..."
composer install

echo ""
echo "2. Installing NPM dependencies..."
npm install

echo ""
echo "3. Copying environment file..."
if [ ! -f .env ]; then
    cp .env.example .env
fi

echo ""
echo "4. Generating application key..."
php artisan key:generate

echo ""
echo "5. Running database migrations and seeders..."
php artisan migrate:fresh --seed

echo ""
echo "6. Building assets..."
npm run build

echo ""
echo "========================================"
echo "   Setup selesai!"
echo "========================================"
echo ""
echo "Untuk menjalankan server, gunakan:"
echo "chmod +x start.sh && ./start.sh"
echo ""
echo "Atau manual:"
echo "php artisan serve"
echo ""
echo "Default Users:"
echo "- Admin: admin@barbershop.com / password"
echo "- Manajer: manajer@barbershop.com / password"
echo "- Pelanggan: pelanggan@barbershop.com / password"
echo "========================================" 