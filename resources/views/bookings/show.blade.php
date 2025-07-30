<x-app-layout>
    <x-slot name="header">
        <h2>Detail Booking</h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto space-y-4">
        <p><strong>Layanan:</strong> {{ $booking->layanan->nama }}</p>
        <p><strong>Barber:</strong> {{ $booking->barber->name }}</p>
        <p><strong>Tanggal:</strong> {{ $booking->tanggal }}</p>
        <p><strong>Jam:</strong> {{ $booking->jam }}</p>

        <a href="{{ route('pelanggan.bookings.index') }}" class="inline-block mt-4 text-blue-600">← Kembali ke daftar</a>
    </div>
</x-app-layout>
