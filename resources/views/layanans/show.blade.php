<x-app-layout>
    <x-slot name="header">
        <h2>Detail Layanan</h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto space-y-4">
        <p><strong>Nama:</strong> {{ $layanan->nama }}</p>
        <p><strong>Deskripsi:</strong> {{ $layanan->deskripsi }}</p>
        <p><strong>Harga:</strong> Rp{{ number_format($layanan->harga) }}</p>

        <a href="{{ route('admin.layanans.index') }}" class="inline-block mt-4 text-blue-600">← Kembali ke daftar</a>
    </div>
</x-app-layout>
