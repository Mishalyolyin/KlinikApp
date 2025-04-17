<div class="min-h-screen bg-white py-10 px-4">
    <h1 class="text-2xl font-bold mb-6">Daftar Pasien Hari Ini (Status: Menunggu)</h1>

    @if ($daftarPasien->isEmpty())
        <p class="text-gray-600">Belum ada pasien yang menunggu hari ini.</p>
    @else
        <table class="min-w-full table-auto border shadow bg-white text-center">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2">Nama Pasien</th>
                    <th class="px-4 py-2">Keluhan</th>
                    <th class="px-4 py-2">Tanggal</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftarPasien as $periksa)
                    <tr>
                        <td class="border px-4 py-2">{{ $periksa->pasien->name }}</td>
                        <td class="border px-4 py-2">{{ $periksa->keluhan }}</td>
                        <td class="border px-4 py-2">{{ $periksa->tanggal->format('d M Y') }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('dokter.resep', ['pasien_id' => $periksa->pasien_id]) }}"
                               class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm">
                                ✏️ Buat Resep
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
