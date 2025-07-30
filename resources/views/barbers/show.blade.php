<x-app-layout>
    <x-slot name="header">
        <h2>Detail Barber</h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto space-y-4">
        <p><strong>Nama:</strong> {{ $barber->name }}</p>
        <p><strong>Spesialisasi:</strong> {{ $barber->specialty }}</p>
        <p><strong>Bio:</strong> {{ $barber->bio }}</p>

        <div>
            <p><strong>Foto:</strong></p>
            <img src="{{ asset('storage/barbers/' . ($barber->image ?: 'budi.jpg')) }}" alt="Foto Barber" class="w-40 h-auto rounded shadow">
        </div>

        <a href="{{ route('admin.barbers.index') }}" class="inline-block mt-4 text-blue-600 hover:underline">← Kembali ke daftar</a>
    </div>
</x-app-layout>
