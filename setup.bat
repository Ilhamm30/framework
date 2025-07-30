@echo off
echo ========================================
echo   Barbershop Management Setup
echo ========================================
echo.

echo [1/6] Installing PHP dependencies...
composer install --no-dev --optimize-autoloader
if %errorlevel% neq 0 (
    echo Error: Failed to install PHP dependencies
    pause
    exit /b 1
)

echo [2/6] Installing Node.js dependencies...
npm install
if %errorlevel% neq 0 (
    echo Error: Failed to install Node.js dependencies
    pause
    exit /b 1
)

echo [3/6] Building assets...
npm run build
if %errorlevel% neq 0 (
    echo Error: Failed to build assets
    pause
    exit /b 1
)

echo [4/6] Clearing caches...
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

echo [5/6] Running migrations...
php artisan migrate --force
if %errorlevel% neq 0 (
    echo Error: Failed to run migrations
    pause
    exit /b 1
)

echo [6/6] Seeding database...
php artisan db:seed --force
if %errorlevel% neq 0 (
    echo Error: Failed to seed database
    pause
    exit /b 1
)

echo.
echo ========================================
echo   Setup completed successfully!
echo ========================================
echo.
echo Default users:
echo - Admin: admin@barbershop.com / password
echo - Manajer: manajer@barbershop.com / password
echo - Pelanggan: pelanggan@barbershop.com / password
echo.
echo To start the server, run: php artisan serve
echo.
pause 