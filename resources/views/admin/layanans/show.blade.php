<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Layanan
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow rounded">
            <p><strong>Nama:</strong> {{ $layanan->nama }}</p>
            <p class="mt-2"><strong>Deskripsi:</strong> {{ $layanan->deskripsi }}</p>
            <p class="mt-2"><strong>Harga:</strong> Rp {{ number_format($layanan->harga, 0, ',', '.') }}</p>

            <div class="mt-4">
                <a href="{{ route('admin.layanans.edit', $layanan->id) }}" class="text-yellow-500">Edit</a> |
                <a href="{{ route('admin.layanans.index') }}" class="text-blue-500">Kembali</a>
            </div>
        </div>
    </div>
</x-app-layout>
