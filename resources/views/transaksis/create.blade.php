<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Tambah Transaksi</h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        <form action="{{ route('manajer.transaksis.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label>Booking</label>
                <select name="booking_id" class="w-full border rounded p-2" required>
                    @foreach ($bookings as $booking)
                        <option value="{{ $booking->id }}">#{{ $booking->id }} - {{ $booking->user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label>Total</label>
                <input type="number" name="total" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label>Metode Bayar</label>
                <select name="metode_bayar" class="w-full border rounded p-2">
                    <option value="cash">Cash</option>
                    <option value="qris">QRIS</option>
                    <option value="transfer">Transfer</option>
                </select>
            </div>

            <div class="mb-4">
                <label>Status</label>
                <select name="status" class="w-full border rounded p-2">
                    <option value="pending">Pending</option>
                    <option value="lunas">Lunas</option>
                </select>
            </div>

            <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
</x-app-layout>
