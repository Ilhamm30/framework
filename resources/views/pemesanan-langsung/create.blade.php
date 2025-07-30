<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pemesanan Langsung
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Buat Pemesanan Langsung</h3>
                <p class="text-sm text-gray-600">Pilih layanan dan barber untuk pemesanan langsung</p>
            </div>

            <form method="POST" action="{{ route('pelanggan.pemesanan-langsung.store') }}" class="space-y-6">
                @csrf

                <!-- Pilih Layanan -->
                <div>
                    <label for="layanan_id" class="block text-sm font-medium text-gray-700 mb-2">
                        Pilih Layanan
                    </label>
                    <select name="layanan_id" id="layanan_id" 
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                            required>
                        <option value="">Pilih Layanan</option>
                        @foreach($layanans as $layanan)
                            <option value="{{ $layanan->id }}" data-harga="{{ $layanan->harga }}">
                                {{ $layanan->nama }} - Rp {{ number_format($layanan->harga, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                    @error('layanan_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Pilih Barber -->
      <div>
    <label for="barber_id" class="block text-sm font-medium text-gray-700 mb-2">
        Pilih Barber
    </label>
    <select name="barber_id" id="barber_id" 
            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
            required>
        <option value="">Pilih Barber</option>
        @foreach($barbers as $barber)
            <option value="{{ $barber->id }}">
                {{ $barber->name }} - {{ $barber->specialty }}
            </option>
        @endforeach
    </select>
    @error('barber_id')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

                <!-- Metode Pembayaran -->
                <div>
                    <label for="metode_bayar" class="block text-sm font-medium text-gray-700 mb-2">
                        Metode Pembayaran
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                            <input type="radio" name="metode_bayar" value="tunai" class="mr-3" required>
                            <div>
                                <div class="font-medium text-gray-900">Tunai</div>
                                <div class="text-sm text-gray-600">Bayar di tempat</div>
                            </div>
                        </label>
                        
                        <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                            <input type="radio" name="metode_bayar" value="transfer" class="mr-3" required>
                            <div>
                                <div class="font-medium text-gray-900">Transfer</div>
                                <div class="text-sm text-gray-600">Transfer bank</div>
                            </div>
                        </label>
                        
                        <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                            <input type="radio" name="metode_bayar" value="qris" class="mr-3" required>
                            <div>
                                <div class="font-medium text-gray-900">QRIS</div>
                                <div class="text-sm text-gray-600">Scan QR Code</div>
                            </div>
                        </label>
                    </div>
                    @error('metode_bayar')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Catatan -->
                <div>
                    <label for="catatan" class="block text-sm font-medium text-gray-700 mb-2">
                        Catatan (Opsional)
                    </label>
                    <textarea name="catatan" id="catatan" rows="3" 
                              class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                              placeholder="Tambahkan catatan khusus untuk layanan Anda..."></textarea>
                    @error('catatan')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Total Harga -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-medium text-gray-700">Total Harga:</span>
                        <span id="total-harga" class="text-lg font-bold text-gray-900">Rp 0</span>
                    </div>
                </div>

                <!-- Tombol Submit -->
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('pelanggan.dashboard') }}" 
                       class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">
                        Batal
                    </a>
                    <button type="submit" 
                            class="px-6 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                        Buat Pemesanan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Update total harga berdasarkan layanan yang dipilih
        document.getElementById('layanan_id').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const harga = selectedOption.dataset.harga || 0;
            document.getElementById('total-harga').textContent = 'Rp ' + parseInt(harga).toLocaleString('id-ID');
        });
    </script>
</x-app-layout> 