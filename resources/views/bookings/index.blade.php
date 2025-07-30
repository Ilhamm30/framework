<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Booking Saya</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto">
        <a href="{{ route('pelanggan.bookings.create') }}" class="bg-green-600 text-white px-4 py-2 rounded mb-4 inline-block">Booking Baru</a>

        <table class="w-full table-auto border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">Layanan</th>
                    <th class="border px-4 py-2">Barber</th>
                    <th class="border px-4 py-2">Tanggal</th>
                    <th class="border px-4 py-2">Jam</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td class="border px-4 py-2">{{ $booking->layanan->nama }}</td>
                        <td class="border px-4 py-2">{{ $booking->barber->name }}</td>
                        <td class="border px-4 py-2">{{ $booking->tanggal }}</td>
                        <td class="border px-4 py-2">{{ $booking->jam }}</td>
                        <td class="border px-4 py-2 space-x-2">
                            <a href="{{ route('pelanggan.bookings.show', $booking->id) }}" class="text-blue-600">Lihat</a>
                            <a href="{{ route('pelanggan.bookings.edit', $booking->id) }}" class="text-yellow-600">Edit</a>
                            <form action="{{ route('pelanggan.bookings.destroy', $booking->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin batalkan booking?')" class="text-red-600">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
