<x-app-layout>
    <x-slot name="header">
        <h2>Edit Transaksi</h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        <form action="{{ route('manajer.transaksis.update', $transaksi->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label>Booking</label>
                <select name="booking_id" class="w-full border p-2 rounded">
                    @foreach ($bookings as $booking)
                        <option value="{{ $booking->id }}" {{ $transaksi->booking_id == $booking->id ? 'selected' : '' }}>
                            #{{ $booking->id }} - {{ $booking->user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label>Total</label>
                <input type="number" name="total" value="{{ $transaksi->total }}" class="w-full border p-2 rounded">
            </div>

            <div class="mb-4">
                <label>Metode Bayar</label>
                <select name="metode_bayar" class="w-full border p-2 rounded">
                    <option value="cash" {{ $transaksi->metode_bayar == 'cash' ? 'selected' : '' }}>Cash</option>
                    <option value="qris" {{ $transaksi->metode_bayar == 'qris' ? 'selected' : '' }}>QRIS</option>
                    <option value="transfer" {{ $transaksi->metode_bayar == 'transfer' ? 'selected' : '' }}>Transfer</option>
                </select>
            </div>

            <div class="mb-4">
                <label>Status</label>
                <select name="status" class="w-full border p-2 rounded">
                    <option value="pending" {{ $transaksi->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="lunas" {{ $transaksi->status == 'lunas' ? 'selected' : '' }}>Lunas</option>
                </select>
            </div>

            <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
</x-app-layout>
