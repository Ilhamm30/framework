<x-app-layout>
    <x-slot name="header">
        Dashboard Admin
    </x-slot>
    <x-slot name="subheader">
        Selamat datang di panel administrasi barbershop
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Statistik Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Barber -->
            <div class="card animate-fade-in">
                <div class="card-body">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4 flex-1">
                            <p class="text-sm font-medium text-gray-600">Total Barber</p>
                            <p class="text-2xl font-bold text-gray-900" data-stat="total-barber">{{ $totalBarber ?? '0' }}</p>
                            <p class="text-xs text-gray-500 mt-1" data-stat="barber-aktif">{{ $barberAktif ?? '0' }} aktif</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Layanan -->
            <div class="card animate-fade-in" style="animation-delay: 0.1s;">
                <div class="card-body">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4 flex-1">
                            <p class="text-sm font-medium text-gray-600">Total Layanan</p>
                            <p class="text-2xl font-bold text-gray-900" data-stat="total-layanan">{{ $totalLayanan ?? '0' }}</p>
                            <p class="text-xs text-gray-500 mt-1" data-stat="layanan-aktif">{{ $layananAktif ?? '0' }} aktif</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Booking Hari Ini -->
            <div class="card animate-fade-in" style="animation-delay: 0.2s;">
                <div class="card-body">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4 flex-1">
                            <p class="text-sm font-medium text-gray-600">Booking Hari Ini</p>
                            <p class="text-2xl font-bold text-gray-900" data-stat="booking-hari-ini">{{ $bookingHariIni ?? '0' }}</p>
                            <p class="text-xs text-gray-500 mt-1" data-stat="booking-minggu-ini">{{ $bookingMingguIni ?? '0' }} minggu ini</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pendapatan Bulan Ini -->
            <div class="card animate-fade-in" style="animation-delay: 0.3s;">
                <div class="card-body">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4 flex-1">
                            <p class="text-sm font-medium text-gray-600">Pendapatan Bulan Ini</p>
                            <p class="text-2xl font-bold text-gray-900" data-stat="total-pendapatan">Rp {{ number_format($totalPendapatan ?? 0, 0, ',', '.') }}</p>
                            <p class="text-xs text-gray-500 mt-1">Bulan {{ now()->format('M Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menu Cepat -->
        <div class="card mb-8 animate-slide-up">
            <div class="card-header">
                <h3 class="text-lg font-semibold text-gray-900">Menu Cepat</h3>
                <p class="text-sm text-gray-600 mt-1">Akses cepat ke fitur-fitur utama</p>
            </div>
            <div class="card-body">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <a href="{{ route('admin.barbers.index') }}" class="group flex items-center p-4 bg-gradient-to-r from-primary-50 to-primary-100 hover:from-primary-100 hover:to-primary-200 rounded-xl transition-all duration-200 transform hover:scale-105">
                        <div class="p-3 bg-primary-500 text-white rounded-lg group-hover:bg-primary-600 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="font-semibold text-gray-900 group-hover:text-primary-700">Kelola Barber</p>
                            <p class="text-sm text-gray-600">Tambah, edit, hapus barber</p>
                        </div>
                    </a>

                    <a href="{{ route('admin.layanans.index') }}" class="group flex items-center p-4 bg-gradient-to-r from-green-50 to-green-100 hover:from-green-100 hover:to-green-200 rounded-xl transition-all duration-200 transform hover:scale-105">
                        <div class="p-3 bg-green-500 text-white rounded-lg group-hover:bg-green-600 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="font-semibold text-gray-900 group-hover:text-green-700">Kelola Layanan</p>
                            <p class="text-sm text-gray-600">Tambah, edit, hapus layanan</p>
                        </div>
                    </a>

                    <a href="{{ route('pelanggan.bookings.index') }}" class="group flex items-center p-4 bg-gradient-to-r from-yellow-50 to-yellow-100 hover:from-yellow-100 hover:to-yellow-200 rounded-xl transition-all duration-200 transform hover:scale-105">
                        <div class="p-3 bg-yellow-500 text-white rounded-lg group-hover:bg-yellow-600 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="font-semibold text-gray-900 group-hover:text-yellow-700">Lihat Booking</p>
                            <p class="text-sm text-gray-600">Monitor semua booking</p>
                        </div>
                    </a>

                    <a href="{{ route('manajer.transaksis.index') }}" class="group flex items-center p-4 bg-gradient-to-r from-purple-50 to-purple-100 hover:from-purple-100 hover:to-purple-200 rounded-xl transition-all duration-200 transform hover:scale-105">
                        <div class="p-3 bg-purple-500 text-white rounded-lg group-hover:bg-purple-600 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="font-semibold text-gray-900 group-hover:text-purple-700">Lihat Transaksi</p>
                            <p class="text-sm text-gray-600">Monitor semua transaksi</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Statistik Detail -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <!-- Aktivitas Terbaru -->
            <div class="card animate-slide-up" style="animation-delay: 0.4s;">
                <div class="card-header">
                    <h3 class="text-lg font-semibold text-gray-900">Aktivitas Terbaru</h3>
                </div>
                <div class="card-body">
                    <div class="space-y-4">
                        <div class="flex items-center p-4 bg-blue-50 rounded-lg">
                            <div class="p-2 bg-blue-500 text-white rounded-lg">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-3 flex-1">
                                <p class="text-sm font-medium text-gray-900">Sistem berjalan dengan baik</p>
                                <p class="text-sm text-gray-600">{{ now()->format('d M Y H:i') }}</p>
                            </div>
                        </div>

                        <div class="flex items-center p-4 bg-green-50 rounded-lg">
                            <div class="p-2 bg-green-500 text-white rounded-lg">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-3 flex-1">
                                <p class="text-sm font-medium text-gray-900">Dashboard admin siap digunakan</p>
                                <p class="text-sm text-gray-600">{{ now()->subMinutes(5)->format('d M Y H:i') }}</p>
                            </div>
                        </div>

                        <div class="flex items-center p-4 bg-yellow-50 rounded-lg">
                            <div class="p-2 bg-yellow-500 text-white rounded-lg">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-3 flex-1">
                                <p class="text-sm font-medium text-gray-900">Booking baru diterima</p>
                                <p class="text-sm text-gray-600">{{ now()->subMinutes(10)->format('d M Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ringkasan Performa -->
            <div class="card animate-slide-up" style="animation-delay: 0.5s;">
                <div class="card-header">
                    <h3 class="text-lg font-semibold text-gray-900">Ringkasan Performa</h3>
                </div>
                <div class="card-body">
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-primary-500 rounded-full mr-3"></div>
                                <span class="text-sm font-medium text-gray-700">Barber Aktif</span>
                            </div>
                            <span class="text-lg font-bold text-gray-900">{{ $barberAktif ?? '0' }}</span>
                        </div>

                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                                <span class="text-sm font-medium text-gray-700">Layanan Aktif</span>
                            </div>
                            <span class="text-lg font-bold text-gray-900">{{ $layananAktif ?? '0' }}</span>
                        </div>

                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-yellow-500 rounded-full mr-3"></div>
                                <span class="text-sm font-medium text-gray-700">Booking Minggu Ini</span>
                            </div>
                            <span class="text-lg font-bold text-gray-900">{{ $bookingMingguIni ?? '0' }}</span>
                        </div>

                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-emerald-500 rounded-full mr-3"></div>
                                <span class="text-sm font-medium text-gray-700">Pendapatan Bulan Ini</span>
                            </div>
                            <span class="text-lg font-bold text-gray-900">Rp {{ number_format($totalPendapatan ?? 0, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="card animate-slide-up" style="animation-delay: 0.6s;">
            <div class="card-header">
                <h3 class="text-lg font-semibold text-gray-900">Quick Actions</h3>
            </div>
            <div class="card-body">
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('admin.barbers.create') }}" class="btn-primary">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Tambah Barber
                    </a>
                    <a href="{{ route('admin.layanans.create') }}" class="btn-success">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Tambah Layanan
                    </a>
                    <a href="{{ route('antrian.index') }}" class="btn-secondary">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        Kelola Antrian
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
