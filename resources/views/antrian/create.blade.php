<x-app-layout>
    <x-slot name="header">
        Ambil Antrian Baru
    </x-slot>
    <x-slot name="subheader">
        Pilih barber untuk mengambil antrian
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="card">
            <div class="card-header">
                <h3 class="text-lg font-semibold text-gray-900">Pilih Barber</h3>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-md">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">Ada kesalahan:</h3>
                                <div class="mt-2 text-sm text-red-700">
                                    <ul class="list-disc pl-5 space-y-1">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <form action="{{ route('antrian.ambil') }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="barber_id" class="form-label">Pilih Barber</label>
                        <select id="barber_id" name="barber_id" class="form-input" required>
                            <option value="">-- Pilih Barber --</option>
                            @forelse($barbers as $barber)
                                <option value="{{ $barber->id }}" {{ old('barber_id') == $barber->id ? 'selected' : '' }}>
                                    {{ $barber->name }} - {{ $barber->specialty }}
                                </option>
                            @empty
                                <option value="" disabled>Tidak ada barber tersedia</option>
                            @endforelse
                        </select>
                        @error('barber_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end space-x-3">
                        <a href="{{ route('antrian.index') }}" class="btn-secondary">
                            Batal
                        </a>
                        <button type="submit" class="btn-primary">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12A9 9 0 113 12a9 9 0 0118 0z"></path>
                            </svg>
                            Ambil Antrian
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
