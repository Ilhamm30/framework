@echo off
echo ========================================
echo    PERBAIKAN SISTEM BARBERSHOP
echo ========================================
echo.

echo [1/6] Membersihkan cache...
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

echo [2/6] Mengoptimalkan autoloader...
composer dump-autoload --optimize

echo [3/6] Menjalankan migrasi...
php artisan migrate --force

echo [4/6] Menjalankan seeder...
php artisan db:seed --force

echo [5/6] Membuat storage link...
php artisan storage:link

echo [6/6] Build assets...
npm run build

echo.
echo ========================================
echo    PERBAIKAN SELESAI!
echo ========================================
echo.
echo Sistem barbershop telah diperbaiki dan siap digunakan.
echo.
echo Default users:
echo - Admin: admin@barbershop.com / password
echo - Manajer: manajer@barbershop.com / password
echo - Pelanggan: pelanggan@barbershop.com / password
echo.
pause 