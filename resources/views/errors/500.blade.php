<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-50">
        <div class="max-w-md w-full text-center">
            <div class="mb-8">
                <div class="w-24 h-24 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-12 h-12 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                </div>
                <h1 class="text-6xl font-bold text-gray-900 mb-2">500</h1>
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">Kesalahan Server</h2>
                <p class="text-gray-600 mb-8">
                    Maaf, terjadi kesalahan pada server. Tim kami sedang bekerja untuk memperbaikinya.
                </p>
            </div>

            <div class="space-y-4">
                <a href="{{ route('dashboard') }}" class="btn-primary inline-flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Kembali ke Dashboard
                </a>

                <div class="text-sm text-gray-500">
                    <p>Jika masalah berlanjut, silakan:</p>
                    <div class="mt-2 space-x-4">
                        <a href="{{ route('login') }}" class="text-primary-600 hover:text-primary-700">Login Ulang</a>
                        <a href="{{ url('/') }}" class="text-primary-600 hover:text-primary-700">Beranda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout> 