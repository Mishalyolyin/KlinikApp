<!-- resources/views/livewire/dokter/dashboard.blade.php -->
<div class="min-h-screen bg-white py-10 px-4">
    <h1 class="text-2xl font-bold mb-6">Selamat Datang, {{ auth()->user()->name }}</h1>

    {{-- Statistik Ringkas --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="bg-blue-100 border border-blue-300 rounded shadow p-4 text-center">
            <h2 class="text-lg font-semibold text-blue-800">Jumlah Obat</h2>
            <p class="text-3xl font-bold text-blue-900">{{ $jumlahObat }}</p>
        </div>
        <div class="bg-gray-100 border border-gray-300 rounded shadow p-4 text-center">
            <h2 class="text-lg font-semibold text-gray-800">Jumlah Resep</h2>
            <p class="text-3xl font-bold text-gray-900">{{ $jumlahResep }}</p>
        </div>
        <div class="bg-green-100 border border-green-300 rounded shadow p-4 text-center">
            <h2 class="text-lg font-semibold text-green-800">Pasien Hari Ini</h2>
            <p class="text-3xl font-bold text-green-900">{{ $pasienHariIni }}</p>
        </div>
    </div>

    {{-- Navigasi Cepat --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-10">
        <a href="{{ route('dokter.obat') }}"
           class="bg-indigo-600 text-white px-4 py-3 rounded text-center hover:bg-indigo-700">Kelola Obat</a>
        <a href="{{ route('dokter.resep') }}"
           class="bg-yellow-500 text-white px-4 py-3 rounded text-center hover:bg-yellow-600">Buat Resep</a>
        <a href="#pasien-hari-ini"
           class="bg-gray-500 text-white px-4 py-3 rounded text-center hover:bg-gray-600">Lihat Pasien</a>
    </div>

    {{-- Grafik --}}
    <div class="mb-10">
        <h2 class="text-xl font-bold mb-4">Grafik Statistik Hari Ini</h2>
        <canvas id="barChart" height="100"></canvas>
    </div>

    {{-- Tabel Pasien Hari Ini --}}
    <div id="pasien-hari-ini" class="bg-white shadow rounded p-6">
        <h2 class="text-xl font-bold mb-4">Pasien Menunggu Hari Ini</h2>
        @if ($pasienMenunggu->count() > 0)
            <table class="min-w-full text-center border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">Keluhan</th>
                        <th class="px-4 py-2">Tanggal</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pasienMenunggu as $periksa)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $periksa->pasien->name }}</td>
                            <td class="px-4 py-2">{{ $periksa->keluhan }}</td>
                            <td class="px-4 py-2">{{ $periksa->tanggal }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('dokter.resep', ['pasien_id' => $periksa->pasien_id]) }}"
                                   class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm">
                                    <i class="fas fa-pen"></i> Isi Resep
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-500">Tidak ada pasien yang menunggu hari ini.</p>
        @endif
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('barChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Obat', 'Resep', 'Pasien Hari Ini'],
                datasets: [{
                    label: 'Statistik',
                    data: [@json($jumlahObat), @json($jumlahResep), @json($pasienHariIni)],
                    backgroundColor: ['#3b82f6', '#facc15', '#10b981'],
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endpush
