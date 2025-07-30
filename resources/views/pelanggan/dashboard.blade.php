<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight">
            Dashboard Pelanggan
        </h2>
    </x-slot>

    <div class="py-8"> {{-- Increased padding-y for more breathing room --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistik Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8"> {{-- Adjusted grid for better spacing, increased gap and mb --}}

                {{-- Card: Total Booking --}}
                <div class="bg-white overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 rounded-xl p-6"> {{-- Softer shadows, rounded-xl, hover effect --}}
                    <div class="flex items-center">
                        <div class="p-4 rounded-full bg-blue-50 text-blue-600 flex-shrink-0"> {{-- Larger padding for icon, flex-shrink-0 to prevent icon from shrinking --}}
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div class="ml-5"> {{-- Increased margin-left for text --}}
                            <p class="text-base font-medium text-gray-500">Total Booking</p> {{-- Slightly lighter gray for descriptive text --}}
                            <p class="text-4xl font-extrabold text-gray-900 mt-1">{{ $bookingSaya }}</p> {{-- Larger and bolder value --}}
                        </div>
                    </div>
                </div>

                {{-- Card: Pemesanan Langsung --}}
                <div class="bg-white overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 rounded-xl p-6">
                    <div class="flex items-center">
                        <div class="p-4 rounded-full bg-green-50 text-green-600 flex-shrink-0">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>
                        <div class="ml-5">
                            <p class="text-base font-medium text-gray-500">Pemesanan Langsung</p>
                            <p class="text-4xl font-extrabold text-gray-900 mt-1">{{ $pemesananLangsungSaya }}</p>
                        </div>
                    </div>
                </div>

                {{-- Card: Antrian Hari Ini (Updated to show barber name if available) --}}
                <div class="bg-white overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 rounded-xl p-6">
                    <div class="flex items-center">
                        <div class="p-4 rounded-full bg-yellow-50 text-yellow-600 flex-shrink-0">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-5">
                            <p class="text-base font-medium text-gray-500">Antrian Hari Ini</p>
                            {{-- Menampilkan nomor antrian dan nama barber jika ada --}}
                            <p class="text-4xl font-extrabold text-gray-900 mt-1">
                                @if($antrianSaya)
                                    {{ $antrianSaya->nomor_antrian }}
                                @else
                                    -
                                @endif
                            </p>
                            <p class="text-sm text-gray-600">
                                @if($antrianSaya && $antrianSaya->barber)
                                    Barber: {{ $antrianSaya->barber->nama }}
                                @else
                                    Tidak ada antrian
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Card: Total Pelanggan (New Card suggestion to fill 4 cols) --}}
                <div class="bg-white overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 rounded-xl p-6">
                    <div class="flex items-center">
                        <div class="p-4 rounded-full bg-purple-50 text-purple-600 flex-shrink-0">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-5">
                            <p class="text-base font-medium text-gray-500">Total Pelanggan</p>
                            <p class="text-4xl font-extrabold text-gray-900 mt-1">{{ $totalPelanggan }}</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Menu Cepat Section -->
            <div class="bg-white overflow-hidden shadow-lg rounded-xl p-7 mb-8"> {{-- Increased padding, rounded-xl, larger mb --}}
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Menu Cepat</h3> {{-- Larger and bolder title --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6"> {{-- Consistent gap --}}

                    <a href="{{ route('pelanggan.bookings.create') }}" class="flex flex-col items-center justify-center p-6 bg-gradient-to-br from-blue-50 to-blue-100 hover:from-blue-100 hover:to-blue-200 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg text-center"> {{-- Gradient background, transform on hover, nicer shadow --}}
                        <div class="p-3 bg-blue-600 text-white rounded-full mb-3 shadow-md"> {{-- Rounded full, shadow on icon --}}
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <p class="font-bold text-lg text-gray-900">Booking Baru</p> {{-- Bolder text --}}
                        <p class="text-sm text-gray-600">Reservasi jadwal cukur Anda</p> {{-- More descriptive sub-text --}}
                    </a>

                    <a href="{{ route('pelanggan.pemesanan-langsung.create') }}" class="flex flex-col items-center justify-center p-6 bg-gradient-to-br from-green-50 to-green-100 hover:from-green-100 hover:to-green-200 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg text-center">
                        <div class="p-3 bg-green-600 text-white rounded-full mb-3 shadow-md">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <p class="font-bold text-lg text-gray-900">Pemesanan Langsung</p>
                        <p class="text-sm text-gray-600">Datang dan bayar di tempat</p>
                    </a>

                    <a href="{{ route('antrian.index') }}" class="flex flex-col items-center justify-center p-6 bg-gradient-to-br from-yellow-50 to-yellow-100 hover:from-yellow-100 hover:to-yellow-200 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg text-center">
                        <div class="p-3 bg-yellow-600 text-white rounded-full mb-3 shadow-md">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <p class="font-bold text-lg text-gray-900">Ambil Antrian</p>
                        <p class="text-sm text-gray-600">Dapatkan nomor antrian hari ini</p>
                    </a>

                    <a href="{{ route('pelanggan.bookings.index') }}" class="flex flex-col items-center justify-center p-6 bg-gradient-to-br from-gray-50 to-gray-100 hover:from-gray-100 hover:to-gray-200 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg text-center">
                        <div class="p-3 bg-gray-600 text-white rounded-full mb-3 shadow-md">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                        <p class="font-bold text-lg text-gray-900">Riwayat Booking</p>
                        <p class="text-sm text-gray-600">Lihat semua riwayat pemesanan</p>
                    </a>

                </div>
            </div>

            <!-- Status Antrian Section -->
            @if($antrianSaya)
            <div class="bg-white overflow-hidden shadow-lg rounded-xl p-7 mb-8"> {{-- Increased padding, rounded-xl, larger mb --}}
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Status Antrian Anda</h3>
                <div class="bg-blue-50 border border-blue-300 rounded-lg p-5 flex items-center justify-between shadow-inner"> {{-- Slightly darker border, inner shadow --}}
                    <div>
                        <p class="text-base text-blue-700 font-medium">Nomor Antrian Anda</p>
                        <p class="text-5xl font-extrabold text-blue-900 mt-2 leading-none">{{ $antrianSaya->nomor_antrian }}</p> {{-- Larger and bolder queue number, tighter line height --}}
                        <p class="text-base text-blue-600 mt-2">
                            Barber:
                            <span class="font-semibold">
                                {{ $antrianSaya->barber ? $antrianSaya->barber->nama : 'Tidak diketahui' }} {{-- Aman dari null barber --}}
                            </span>
                        </p>
                    </div>
                    <div class="text-right">
                        <span class="px-4 py-2 rounded-full text-lg font-bold {{ $antrianSaya->status_color }} shadow-md"> {{-- Larger badge, bold font, shadow --}}
                            {{ $antrianSaya->status_text }}
                        </span>
                    </div>
                </div>
            </div>
            @else
            <div class="bg-white overflow-hidden shadow-lg rounded-xl p-7 mb-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Status Antrian Anda</h3>
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-5 text-center text-gray-600 italic">
                    <p>Anda belum memiliki antrian aktif hari ini.</p>
                    <a href="{{ route('antrian.index') }}" class="mt-3 inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors">
                        Ambil Antrian Sekarang
                    </a>
                </div>
            </div>
            @endif

            <!-- Aktivitas Terbaru Section -->
            <div class="bg-white overflow-hidden shadow-lg rounded-xl p-7"> {{-- Increased padding, rounded-xl --}}
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Aktivitas Terbaru</h3>
                <div class="space-y-4"> {{-- Added consistent spacing between activity items --}}
                    @if($bookingTerakhir || $pemesananLangsungTerakhir)
                        @if($bookingTerakhir)
                        <div class="flex items-center p-4 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors shadow-sm"> {{-- Subtle shadow, hover effect --}}
                            <div class="p-3 bg-blue-500 text-white rounded-md flex-shrink-0"> {{-- Rounded-md, flex-shrink-0 --}}
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="ml-4 flex-1"> {{-- Increased margin-left, flex-1 for content --}}
                                <p class="text-base font-medium text-gray-900">Booking terakhir: <span class="font-semibold">{{ $bookingTerakhir->layanan->nama }}</span></p>
                                <p class="text-sm text-gray-600 mt-1">
                                    Barber: {{ $bookingTerakhir->barber ? $bookingTerakhir->barber->nama : 'Tidak diketahui' }}
                                    <span class="ml-2">|</span>
                                    {{ $bookingTerakhir->created_at->translatedFormat('d M Y, H:i') }}
                                </p>
                            </div>
                        </div>
                        @endif

                        @if($pemesananLangsungTerakhir)
                        <div class="flex items-center p-4 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors shadow-sm">
                            <div class="p-3 bg-green-500 text-white rounded-md flex-shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <div class="ml-4 flex-1">
                                <p class="text-base font-medium text-gray-900">Pemesanan langsung: <span class="font-semibold">{{ $pemesananLangsungTerakhir->layanan->nama }}</span></p>
                                <p class="text-sm text-gray-600 mt-1">
                                    Barber: {{ $pemesananLangsungTerakhir->barber ? $pemesananLangsungTerakhir->barber->nama : 'Tidak diketahui' }}
                                    <span class="ml-2">|</span>
                                    {{ $pemesananLangsungTerakhir->created_at->translatedFormat('d M Y, H:i') }}
                                </p>
                            </div>
                        </div>
                        @endif
                    @else
                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-5 text-center text-gray-600 italic">
                        <p>Belum ada aktivitas terbaru.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
