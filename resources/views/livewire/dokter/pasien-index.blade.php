<div class="min-h-screen py-10 px-4 bg-white">
    <h1 class="text-2xl font-bold mb-6">Daftar Pasien Hari Ini</h1>

    @if (session('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    @if ($pasiens && $pasiens->count() > 0)
        <table class="min-w-full table-auto border shadow text-center">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Keluhan</th>
                    <th class="px-4 py-2">Tanggal</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pasiens as $periksa)
                    <tr class="border">
                        <td class="px-4 py-2">{{ $periksa->pasien->name }}</td>
                        <td class="px-4 py-2">{{ $periksa->keluhan }}</td>
                        <td class="px-4 py-2">{{ $periksa->tanggal }}</td>
                        <td class="px-4 py-2">{{ $periksa->status }}</td>
                        <td class="px-4 py-2">
                            @if ($periksa->status === 'menunggu')
                                <a href="{{ route('dokter.resep', ['pasien_id' => $periksa->pasien_id]) }}"
                                   class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm">
                                    <i class="fas fa-pen"></i> Isi Resep
                                </a>
                            @else
                                <a href="#" class="text-sm text-gray-600 underline">Lihat Selengkapnya</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-gray-500">Belum ada pasien hari ini.</p>
    @endif
</div>
