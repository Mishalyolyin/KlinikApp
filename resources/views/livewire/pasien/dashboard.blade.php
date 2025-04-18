<div class="p-6 max-w-6xl mx-auto">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Dashboard Pasien</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <a href="{{ route('pasien.ajukan-periksa') }}"
           class="block bg-blue-600 hover:bg-blue-700 text-white rounded-lg p-6 shadow transition duration-300">
            <div class="flex items-center space-x-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M8 12h8m-4-4v8m8 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div>
                    <h3 class="text-xl font-bold">Ajukan Periksa</h3>
                    <p class="text-sm">Isi keluhan dan jadwalkan pemeriksaan.</p>
                </div>
            </div>
        </a>

        <a href="{{ route('pasien.riwayat-resep') }}"
           class="block bg-green-600 hover:bg-green-700 text-white rounded-lg p-6 shadow transition duration-300">
            <div class="flex items-center space-x-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 17v-2a4 4 0 014-4h1m4 0h2m-2 0a2 2 0 00-2-2h-3a2 2 0 00-2 2m-4 0H5a2 2 0 00-2 2v4a2 2 0 002 2h2"/>
                </svg>
                <div>
                    <h3 class="text-xl font-bold">Riwayat Resep</h3>
                    <p class="text-sm">Lihat resep yang pernah diberikan dokter.</p>
                </div>
            </div>
        </a>
    </div>

    <div class="bg-white rounded-lg shadow p-6 text-gray-700">
        <p class="text-base mb-1">Selamat datang, <strong>{{ auth()->user()->name }}</strong>.</p>
        <p class="text-sm text-gray-500">Gunakan menu di sebelah kiri untuk mengakses layanan pasien.</p>
    </div>
</div>
