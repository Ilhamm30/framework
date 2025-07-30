<x-app-layout>
    <x-slot name="header">
        Sistem Antrian
    </x-slot>
    <x-slot name="subheader">
        Kelola antrian barbershop hari ini
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="card mb-6">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Antrian Hari Ini</h3>
                        <p class="text-sm text-gray-600">{{ now()->format('d M Y') }}</p>
                    </div>
                    @auth
                        @if(!$antrianSaya)
                            <button onclick="document.getElementById('ambilAntrianModal').classList.remove('hidden')" 
                                    class="btn-primary">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Ambil Antrian
                            </button>
                        @else
                            <span class="badge badge-success">
                                Anda sudah memiliki antrian
                            </span>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="btn-primary">
                            Login untuk Ambil Antrian
                        </a>
                    @endauth
                </div>
            </div>
        </div>

        <!-- Status Antrian Saya -->
        @if($antrianSaya)
        <div class="card mb-6">
            <div class="card-header">
                <h3 class="text-lg font-semibold text-gray-900">Antrian Anda</h3>
            </div>
            <div class="card-body">
                <div class="bg-gradient-to-r from-primary-500 to-primary-600 text-white rounded-lg p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm opacity-90">Nomor Antrian</p>
                            <p class="text-4xl font-bold">{{ $antrianSaya->nomor_antrian }}</p>
                            <p class="text-sm opacity-90 mt-2">Barber: {{ $antrianSaya->barber->name }}</p>
                            <p class="text-sm opacity-90">Waktu: {{ $antrianSaya->created_at->format('H:i') }}</p>
                        </div>
                        <div class="text-right">
                            <span class="badge badge-success">
                                {{ $antrianSaya->status_text }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Daftar Antrian -->
        <div class="card">
            <div class="card-header">
                <h3 class="text-lg font-semibold text-gray-900">Daftar Antrian Hari Ini</h3>
            </div>
            <div class="card-body">
                @if($antrianHariIni->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($antrianHariIni as $antrian)
                        <div class="border rounded-lg p-4 {{ $antrian->user_id === Auth::id() ? 'border-primary-500 bg-primary-50' : 'border-gray-200' }}">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-primary-500 text-white rounded-full flex items-center justify-center text-sm font-bold">
                                        {{ $antrian->nomor_antrian }}
                                    </div>
                                    <div class="ml-3">
                                        <p class="font-medium text-gray-900">{{ $antrian->user->name }}</p>
                                        <p class="text-sm text-gray-600">{{ $antrian->barber->name }}</p>
                                    </div>
                                </div>
                                <span class="badge {{ $antrian->status === 'menunggu' ? 'badge-warning' : ($antrian->status === 'dipanggil' ? 'badge-info' : ($antrian->status === 'proses' ? 'badge-warning' : 'badge-success')) }}">
                                    {{ $antrian->status_text }}
                                </span>
                            </div>
                            <div class="text-xs text-gray-500">
                                Waktu: {{ $antrian->created_at->format('H:i') }}
                            </div>
                            
                            @if(Auth::check() && in_array(Auth::user()->role, ['admin', 'manajer']))
                            <div class="mt-3 flex space-x-2">
                                @if($antrian->status === 'menunggu')
                                    <form method="POST" action="{{ route('antrian.panggil', $antrian) }}" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn-primary text-xs px-2 py-1">
                                            Panggil
                                        </button>
                                    </form>
                                @endif
                                
                                @if($antrian->status === 'dipanggil')
                                    <form method="POST" action="{{ route('antrian.mulai', $antrian) }}" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn-secondary text-xs px-2 py-1">
                                            Mulai
                                        </button>
                                    </form>
                                @endif
                                
                                @if($antrian->status === 'proses')
                                    <form method="POST" action="{{ route('antrian.selesai', $antrian) }}" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn-success text-xs px-2 py-1">
                                            Selesai
                                        </button>
                                    </form>
                                @endif
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada antrian</h3>
                        <p class="mt-1 text-sm text-gray-500">Jadilah yang pertama mengambil antrian hari ini!</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal Ambil Antrian -->
    <div id="ambilAntrianModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Pilih Barber</h3>
                <form method="POST" action="{{ route('antrian.ambil') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="barber_id" class="form-label">Pilih Barber</label>
                        <select name="barber_id" id="barber_id" class="form-input" required>
                            <option value="">Pilih Barber</option>
                            @foreach($barbers as $barber)
                                <option value="{{ $barber->id }}">{{ $barber->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="document.getElementById('ambilAntrianModal').classList.add('hidden')" 
                                class="btn-secondary">
                            Batal
                        </button>
                        <button type="submit" class="btn-primary">
                            Ambil Antrian
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout> 