<x-app-layout>
    <x-slot name="header">
        <h2>Edit Booking</h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        <form action="{{ route('pelanggan.bookings.update', $booking->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label>Layanan</label>
                <select name="layanan_id" class="w-full border p-2 rounded">
                    @foreach ($layanans as $layanan)
                        <option value="{{ $layanan->id }}" {{ $booking->layanan_id == $layanan->id ? 'selected' : '' }}>
                            {{ $layanan->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label>Barber</label>
                <select name="barber_id" class="w-full border p-2 rounded">
                    @foreach ($barbers as $barber)
                        <option value="{{ $barber->id }}" {{ $booking->barber_id == $barber->id ? 'selected' : '' }}>
                            {{ $barber->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label>Tanggal</label>
                <input type="date" name="tanggal" value="{{ $booking->tanggal }}" class="w-full border p-2 rounded">
            </div>

            <div class="mb-4">
                <label>Jam</label>
                <input type="time" name="jam" value="{{ $booking->jam }}" class="w-full border p-2 rounded">
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
</x-app-layout>
