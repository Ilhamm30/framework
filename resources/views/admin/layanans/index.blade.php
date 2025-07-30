<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Layanan
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('admin.layanans.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4 inline-block">Tambah Layanan</a>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">#</th>
                        <th class="border px-4 py-2">Nama</th>
                        <th class="border px-4 py-2">Harga</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($layanans as $layanan)
                        <tr>
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $layanan->nama }}</td>
                            <td class="border px-4 py-2">Rp {{ number_format($layanan->harga, 0, ',', '.') }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('admin.layanans.show', $layanan->id) }}" class="text-blue-500">Lihat</a> |
                                <a href="{{ route('admin.layanans.edit', $layanan->id) }}" class="text-yellow-500">Edit</a> |
                                <form action="{{ route('admin.layanans.destroy', $layanan->id) }}" method="POST" style="display:inline">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus?')" class="text-red-600">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
