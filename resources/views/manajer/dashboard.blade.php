<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Manajer
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Statistik Utama -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Total Transaksi -->
            <div class="bg-white p-6 rounded-lg shadow text-center">
                <h3 class="text-lg font-semibold text-gray-700">Total Transaksi</h3>
                <p class="text-2xl text-blue-600 font-bold">
                    {{ $totalTransaksi ?? '0' }}
                </p>
            </div>

            <!-- Total Pendapatan -->
            <div class="bg-white p-6 rounded-lg shadow text-center">
                <h3 class="text-lg font-semibold text-gray-700">Total Pendapatan</h3>
                <p class="text-2xl text-green-600 font-bold">
                    Rp {{ number_format($totalPendapatan ?? 0, 0, ',', '.') }}
                </p>
            </div>

            <!-- Booking Minggu Ini -->
            <div class="bg-white p-6 rounded-lg shadow text-center">
                <h3 class="text-lg font-semibold text-gray-700">Booking Minggu Ini</h3>
                <p class="text-2xl text-orange-600 font-bold">
                    {{ $bookingMingguIni ?? '0' }}
                </p>
            </div>
        </div>

        <!-- Akses Cepat -->
        <div class="mt-10">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Akses Cepat</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <a href="{{ route('manajer.transaksis.index') }}"
                   class="bg-blue-500 hover:bg-blue-600 text-white text-center p-4 rounded-lg transition duration-200">
                    Kelola Transaksi
                </a>
                <a href="{{ route('manajer.transaksis.create') }}"
                   class="bg-green-500 hover:bg-green-600 text-white text-center p-4 rounded-lg transition duration-200">
                    Tambah Transaksi
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
