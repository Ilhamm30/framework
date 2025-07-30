<div class="mb-4">
    <label for="nama" class="block font-medium">Nama Layanan</label>
    <input type="text" name="nama" id="nama" class="w-full border-gray-300 rounded" value="{{ old('nama', $layanan->nama ?? '') }}" required>
</div>

<div class="mb-4">
    <label for="deskripsi" class="block font-medium">Deskripsi</label>
    <textarea name="deskripsi" id="deskripsi" class="w-full border-gray-300 rounded">{{ old('deskripsi', $layanan->deskripsi ?? '') }}</textarea>
</div>

<div class="mb-4">
    <label for="harga" class="block font-medium">Harga (Rp)</label>
    <input type="number" name="harga" id="harga" class="w-full border-gray-300 rounded" value="{{ old('harga', $layanan->harga ?? '') }}" required>
</div>
