<x-app-layout>
    <x-slot name="header">
        <h2>Detail Transaksi</h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto space-y-4">
        <p><strong>ID Booking:</strong> #{{ $transaksi->booking_id }}</p>
        <p><strong>Total:</strong> Rp{{ number_format($transaksi->total) }}</p>
        <p><strong>Metode Bayar:</strong> {{ $transaksi->metode_bayar }}</p>
        <p><strong>Status:</strong> {{ ucfirst($transaksi->status) }}</p>

        <a href="{{ route('manajer.transaksis.index') }}" class="inline-block mt-4 text-blue-600">← Kembali ke daftar</a>
    </div>
</x-app-layout>
