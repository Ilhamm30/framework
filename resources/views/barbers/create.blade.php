<x-app-layout>
    <x-slot name="header">
        Tambah Barber
    </x-slot>
    <x-slot name="subheader">
        Tambahkan barber baru ke sistem
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="card">
            <div class="card-header">
                <h3 class="text-lg font-semibold text-gray-900">Form Tambah Barber</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.barbers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="form-label">Nama Barber</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-input @error('name') border-red-500 @enderror" required>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="form-label">Spesialisasi</label>
                            <input type="text" name="specialty" value="{{ old('specialty') }}" class="form-input @error('specialty') border-red-500 @enderror" required>
                            @error('specialty')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label class="form-label">Bio</label>
                            <textarea name="bio" rows="4" class="form-input @error('bio') border-red-500 @enderror">{{ old('bio') }}</textarea>
                            @error('bio')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="form-label">Foto</label>
                            <input type="file" name="image" accept="image/*" class="form-input @error('image') border-red-500 @enderror">
                            @error('image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-sm text-gray-500">Format: JPG, JPEG, PNG. Maksimal 2MB.</p>
                        </div>

                        <div>
                            <label class="form-label">Status</label>
                            <select name="status" class="form-input @error('status') border-red-500 @enderror" required>
                                <option value="">Pilih Status</option>
                                <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-6 space-x-3">
                        <a href="{{ route('admin.barbers.index') }}" class="btn-secondary">
                            Batal
                        </a>
                        <button type="submit" class="btn-primary">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Simpan Barber
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
