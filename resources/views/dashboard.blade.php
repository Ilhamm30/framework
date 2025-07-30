<x-app-layout> {{-- Menggunakan layout yang sudah ada --}}
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-barber-dark leading-tight">
            Dashboard Admin
        </h2>
        <p class="mt-2 text-gray-600">Selamat datang di panel administrasi barbershop Anda.</p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6"> {{-- Container utama dashboard --}}

                {{-- Ringkasan Statistik --}}
                <h3 class="text-xl font-bold text-barber-dark mb-5">Ringkasan Utama</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    {{-- Card Total Barber --}}
                    <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-barber-primary flex items-center justify-between transition duration-300 hover:shadow-lg hover:scale-[1.01]">
                        <div>
                            <p class="text-gray-500 text-sm">Total Barber</p>
                            <p class="text-3xl font-bold text-barber-dark mt-1">0</p>
                            <p class="text-xs text-gray-400">0 aktif</p>
                        </div>
                        <div class="bg-barber-primary bg-opacity-10 text-barber-primary rounded-full p-3 text-2xl">
                            <i class="fa-solid fa-users"></i>
                        </div>
                    </div>

                    {{-- Card Total Layanan --}}
                    <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-green-500 flex items-center justify-between transition duration-300 hover:shadow-lg hover:scale-[1.01]">
                        <div>
                            <p class="text-gray-500 text-sm">Total Layanan</p>
                            <p class="text-3xl font-bold text-barber-dark mt-1">0</p>
                            <p class="text-xs text-gray-400">0 aktif</p>
                        </div>
                        <div class="bg-green-500 bg-opacity-10 text-green-500 rounded-full p-3 text-2xl">
                            <i class="fa-solid fa-scissors"></i>
                        </div>
                    </div>

                    {{-- Card Booking Hari Ini --}}
                    <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-yellow-500 flex items-center justify-between transition duration-300 hover:shadow-lg hover:scale-[1.01]">
                        <div>
                            <p class="text-gray-500 text-sm">Booking Hari Ini</p>
                            <p class="text-3xl font-bold text-barber-dark mt-1">0</p>
                            <p class="text-xs text-gray-400">0 minggu ini</p>
                        </div>
                        <div class="bg-yellow-500 bg-opacity-10 text-yellow-500 rounded-full p-3 text-2xl">
                            <i class="fa-solid fa-calendar-alt"></i>
                        </div>
                    </div>

                    {{-- Card Pendapatan Bulan Ini --}}
                    <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-purple-500 flex items-center justify-between transition duration-300 hover:shadow-lg hover:scale-[1.01]">
                        <div>
                            <p class="text-gray-500 text-sm">Pendapatan Bulan Ini</p>
                            <p class="text-3xl font-bold text-barber-dark mt-1">Rp 0</p>
                            <p class="text-xs text-gray-400">Bulan Juli 2025</p>
                        </div>
                        <div class="bg-purple-500 bg-opacity-10 text-purple-500 rounded-full p-3 text-2xl">
                            <i class="fa-solid fa-dollar-sign"></i>
                        </div>
                    </div>
                </div>

                {{-- Menu Cepat --}}
                <h3 class="text-xl font-bold text-barber-dark mb-5">Menu Cepat</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    {{-- Kelola Barber --}}
                    <a href="#" class="block bg-white p-6 rounded-xl shadow-md text-center transition duration-300 hover:shadow-lg hover:scale-[1.01] border-b-4 border-barber-primary group">
                        <div class="text-barber-primary text-4xl mb-3 group-hover:text-barber-secondary">
                            <i class="fa-solid fa-user-tie"></i>
                        </div>
                        <p class="font-semibold text-barber-dark text-lg mb-1">Kelola Barber</p>
                        <p class="text-gray-500 text-sm">Tambah, edit, hapus barber</p>
                    </a>

                    {{-- Kelola Layanan --}}
                    <a href="#" class="block bg-white p-6 rounded-xl shadow-md text-center transition duration-300 hover:shadow-lg hover:scale-[1.01] border-b-4 border-green-500 group">
                        <div class="text-green-500 text-4xl mb-3 group-hover:text-green-600">
                            <i class="fa-solid fa-brush"></i>
                        </div>
                        <p class="font-semibold text-barber-dark text-lg mb-1">Kelola Layanan</p>
                        <p class="text-gray-500 text-sm">Tambah, edit, hapus layanan</p>
                    </a>

                    {{-- Lihat Booking --}}
                    <a href="#" class="block bg-white p-6 rounded-xl shadow-md text-center transition duration-300 hover:shadow-lg hover:scale-[1.01] border-b-4 border-yellow-500 group">
                        <div class="text-yellow-500 text-4xl mb-3 group-hover:text-yellow-600">
                            <i class="fa-solid fa-book"></i>
                        </div>
                        <p class="font-semibold text-barber-dark text-lg mb-1">Lihat Booking</p>
                        <p class="text-gray-500 text-sm">Monitor semua booking</p>
                    </a>

                    {{-- Lihat Transaksi --}}
                    <a href="#" class="block bg-white p-6 rounded-xl shadow-md text-center transition duration-300 hover:shadow-lg hover:scale-[1.01] border-b-4 border-purple-500 group">
                        <div class="text-purple-500 text-4xl mb-3 group-hover:text-purple-600">
                            <i class="fa-solid fa-receipt"></i>
                        </div>
                        <p class="font-semibold text-barber-dark text-lg mb-1">Lihat Transaksi</p>
                        <p class="text-gray-500 text-sm">Monitor semua transaksi</p>
                    </a>
                </div>

                {{-- Aktivitas Terbaru & Ringkasan Performa (Grid 2 kolom) --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    {{-- Aktivitas Terbaru --}}
                    <div class="bg-white p-6 rounded-xl shadow-md">
                        <h3 class="text-xl font-bold text-barber-dark mb-5">Aktivitas Terbaru</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start bg-blue-50 bg-opacity-75 p-3 rounded-lg border border-blue-100">
                                <div class="text-blue-500 text-xl mr-3 mt-1"><i class="fa-solid fa-circle-check"></i></div>
                                <div>
                                    <p class="font-semibold text-gray-800">Sistem berjalan dengan baik</p>
                                    <p class="text-gray-600 text-sm">28 Juli 2025 20:23</p>
                                </div>
                            </li>
                            <li class="flex items-start bg-green-50 bg-opacity-75 p-3 rounded-lg border border-green-100">
                                <div class="text-green-500 text-xl mr-3 mt-1"><i class="fa-solid fa-gauge-high"></i></div>
                                <div>
                                    <p class="font-semibold text-gray-800">Dashboard admin siap digunakan</p>
                                    <p class="text-gray-600 text-sm">28 Juli 2025 20:18</p>
                                </div>
                            </li>
                            <li class="flex items-start bg-yellow-50 bg-opacity-75 p-3 rounded-lg border border-yellow-100">
                                <div class="text-yellow-500 text-xl mr-3 mt-1"><i class="fa-solid fa-calendar-plus"></i></div>
                                <div>
                                    <p class="font-semibold text-gray-800">Booking baru diterima</p>
                                    <p class="text-gray-600 text-sm">28 Juli 2025 20:13</p>
                                </div>
                            </li>
                            {{-- Tambahkan aktivitas lain di sini --}}
                        </ul>
                    </div>

                    {{-- Ringkasan Performa --}}
                    <div class="bg-white p-6 rounded-xl shadow-md">
                        <h3 class="text-xl font-bold text-barber-dark mb-5">Ringkasan Performa</h3>
                        <ul class="space-y-4">
                            <li class="flex justify-between items-center pb-2 border-b border-gray-100 last:border-b-0">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-barber-primary rounded-full mr-3"></div>
                                    <p class="text-gray-700">Barber Aktif</p>
                                </div>
                                <span class="font-bold text-barber-dark">0</span>
                            </li>
                            <li class="flex justify-between items-center pb-2 border-b border-gray-100 last:border-b-0">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                                    <p class="text-gray-700">Layanan Aktif</p>
                                </div>
                                <span class="font-bold text-barber-dark">0</span>
                            </li>
                            <li class="flex justify-between items-center pb-2 border-b border-gray-100 last:border-b-0">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-yellow-500 rounded-full mr-3"></div>
                                    <p class="text-gray-700">Booking Minggu Ini</p>
                                </div>
                                <span class="font-bold text-barber-dark">0</span>u
                            {{-- Tambahkan metrik performa lain di sini --}}
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>