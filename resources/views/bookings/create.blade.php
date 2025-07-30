<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Booking Layanan</h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        <form action="{{ route('pelanggan.bookings.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label>Layanan</label>
                <select name="layanan_id" class="w-full border rounded p-2" required>
                    @foreach ($layanans as $layanan)
                        <option value="{{ $layanan->id }}">{{ $layanan->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label>Barber</label>
                <select name="barber_id" class="w-full border rounded p-2" required>
                    @foreach ($barbers as $barber)
                        <option value="{{ $barber->id }}">{{ $barber->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label>Jam</label>
                <input type="time" name="jam" class="w-full border rounded p-2" required>
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Booking</button>
        </form>
    </div>
</x-app-layout>
