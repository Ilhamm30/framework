<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="Sistem Manajemen Barbershop - Aplikasi modern untuk mengelola barbershop dengan fitur booking, antrian, dan manajemen transaksi">
    <meta name="keywords" content="barbershop, salon, booking, appointment, management, sistem manajemen">
    <meta name="author" content="Barbershop Management">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Barbershop Management - Sistem Manajemen Modern">
    <meta property="og:description" content="Aplikasi web modern untuk mengelola barbershop dengan fitur booking, antrian, dan manajemen transaksi">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="Barbershop Management - Sistem Manajemen Modern">
    <meta name="twitter:description" content="Aplikasi web modern untuk mengelola barbershop dengan fitur booking, antrian, dan manajemen transaksi">
    <meta name="twitter:image" content="{{ asset('images/og-image.jpg') }}">

    <title>{{ config('app.name', 'Barbershop Management') }} - Sistem Manajemen Modern</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Theme Meta -->
    <meta name="theme-color" content="#f2750a">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
</head>

<body class="antialiased bg-gray-100 dark:bg-gray-900">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center dark:bg-dots-lighter selection:bg-red-500 selection:text-white">

        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:outline-red-500">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:outline-red-500">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:outline-red-500">
                            Register
                        </a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <!-- Logo -->
            <div class="flex justify-center mb-8">
                <div class="w-20 h-20 bg-primary-600 rounded-full flex items-center justify-center">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            </div>

            <!-- Feature Cards -->
            <div class="mt-16 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                @foreach ([
                    ['title' => 'Sistem Manajemen Modern', 'desc' => 'Aplikasi web modern untuk mengelola barbershop dengan fitur lengkap termasuk booking online, sistem antrian, dan manajemen transaksi.'],
                    ['title' => 'Multi-Role System', 'desc' => 'Sistem role yang fleksibel untuk admin, manajer, dan pelanggan dengan akses dan fitur yang berbeda sesuai kebutuhan.'],
                    ['title' => 'Booking & Antrian', 'desc' => 'Sistem booking online yang mudah digunakan dan antrian digital real-time untuk mengoptimalkan layanan pelanggan.'],
                    ['title' => 'Analytics & Laporan', 'desc' => 'Dashboard analytics yang informatif dengan laporan pendapatan, performa barber, dan statistik bisnis yang detail.'],
                ] as $feature)
                    <div class="p-6 bg-white rounded-lg shadow-2xl shadow-gray-500/20 transition-transform transform motion-safe:hover:scale-[1.01] focus:outline focus:outline-2 focus:outline-red-500">
                        <h2 class="text-xl font-semibold text-gray-900">{{ $feature['title'] }}</h2>
                        <p class="mt-4 text-gray-600 text-sm leading-relaxed">
                            {{ $feature['desc'] }}
                        </p>
                    </div>
                @endforeach
            </div>

            <!-- Footer -->
            <div class="flex justify-center mt-16 px-6 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-start flex items-center gap-4">
                    <a href="https://github.com/sponsors/taylorotwell" class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white">
                        <svg class="w-5 h-5 stroke-gray-400 group-hover:stroke-gray-600 dark:stroke-gray-600 dark:group-hover:stroke-gray-400 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5C14.377 3.75 12.715 4.876 12 6.483 11.285 4.876 9.623 3.75 7.687 3.75 5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                        Sponsor
                    </a>

                    <span class="hidden sm:inline-block border-l border-gray-300 dark:border-gray-700 ml-4 pl-4">
                        <a href="https://github.com/laravel/laravel" class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white">
                            <svg class="w-5 h-5 stroke-gray-400 group-hover:stroke-gray-600 dark:stroke-gray-600 dark:group-hover:stroke-gray-400 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672L13.684 16.6l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672ZM12 2.25V4.5m5.834.166-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243-1.59-1.59" />
                            </svg>
                            Laravel
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
