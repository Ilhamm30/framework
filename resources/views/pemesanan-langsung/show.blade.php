<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Pemesanan Langsung
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <!-- Header -->
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Pemesanan #{{ $pemesananLangsung->id }}</h3>
                    <p class="text-sm text-gray-600">{{ $pemesananLangsung->created_at->format('d M Y H:i') }}</p>
                </div>
                <span class="px-3 py-1 rounded-full text-sm font-medium 
                    @if($pemesananLangsung->status === 'pending') bg-yellow-100 text-yellow-800
                    @elseif($pemesananLangsung->status === 'proses') bg-blue-100 text-blue-800
                    @elseif($pemesananLangsung->status === 'selesai') bg-green-100 text-green-800
                    @else bg-red-100 text-red-800 @endif">
                    {{ ucfirst($pemesananLangsung->status) }}
                </span>
            </div>

            <!-- Informasi Pemesanan -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h4 class="font-medium text-gray-900 mb-3">Informasi Layanan</h4>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Layanan:</span>
                            <span class="text-sm font-medium">{{ $pemesananLangsung->layanan->nama }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Barber:</span>
                            <span class="text-sm font-medium">{{ $pemesananLangsung->barber->nama }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Spesialisasi:</span>
                            <span class="text-sm font-medium">{{ $pemesananLangsung->barber->spesialisasi }}</span>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 p-4 rounded-lg">
                    <h4 class="font-medium text-gray-900 mb-3">Informasi Pembayaran</h4>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Total Harga:</span>
                            <span class="text-sm font-bold text-green-600">Rp {{ number_format($pemesananLangsung->total_harga, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Metode Bayar:</span>
                            <span class="text-sm font-medium">{{ ucfirst($pemesananLangsung->metode_bayar) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Status:</span>
                            <span class="text-sm font-medium">{{ ucfirst($pemesananLangsung->status) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Timeline -->
            <div class="mb-6">
                <h4 class="font-medium text-gray-900 mb-3">Timeline</h4>
                <div class="space-y-3">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                        <div class="flex-1">
                            <p class="text-sm font-medium">Pemesanan Dibuat</p>
                            <p class="text-xs text-gray-600">{{ $pemesananLangsung->waktu_pemesanan->format('d M Y H:i') }}</p>
                        </div>
                    </div>
                    
                    @if($pemesananLangsung->waktu_pembayaran)
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-blue-500 rounded-full mr-3"></div>
                        <div class="flex-1">
                            <p class="text-sm font-medium">Pembayaran Diterima</p>
                            <p class="text-xs text-gray-600">{{ $pemesananLangsung->waktu_pembayaran->format('d M Y H:i') }}</p>
                        </div>
                    </div>
                    @endif
                    
                    @if($pemesananLangsung->waktu_selesai)
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                        <div class="flex-1">
                            <p class="text-sm font-medium">Layanan Selesai</p>
                            <p class="text-xs text-gray-600">{{ $pemesananLangsung->waktu_selesai->format('d M Y H:i') }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Catatan -->
            @if($pemesananLangsung->catatan)
            <div class="mb-6">
                <h4 class="font-medium text-gray-900 mb-2">Catatan</h4>
                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                    <p class="text-sm text-gray-700">{{ $pemesananLangsung->catatan }}</p>
                </div>
            </div>
            @endif

            <!-- Actions -->
            <div class="flex justify-between items-center pt-6 border-t">
                <a href="{{ route('pelanggan.pemesanan-langsung.index') }}" 
                   class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">
                    Kembali ke Daftar
                </a>
                
                @if($pemesananLangsung->status === 'pending')
                <div class="flex space-x-3">
                    <form method="POST" action="{{ route('pelanggan.pemesanan-langsung.update-status', $pemesananLangsung) }}" class="inline">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="dibatalkan">
                        <button type="submit" 
                                class="px-4 py-2 text-sm font-medium text-red-700 bg-red-100 rounded-md hover:bg-red-200"
                                onclick="return confirm('Apakah Anda yakin ingin membatalkan pemesanan ini?')">
                            Batalkan Pemesanan
                        </button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout> 