<div class="max-w-5xl mx-auto py-10 px-4">
    <h1 class="text-2xl font-bold mb-4">Riwayat Resep - {{ $pasien->name }}</h1>

    @if ($reseps->count())
        <table class="min-w-full table-auto border shadow text-center">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2">Tanggal</th>
                    <th class="px-4 py-2">Nama Obat</th>
                    <th class="px-4 py-2">Dosis</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reseps as $resep)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($resep->tanggal_cek)->translatedFormat('d F Y') }}</td>
                        <td class="px-4 py-2">{{ $resep->obat->nama ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $resep->dosis }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-gray-600">Pasien ini belum memiliki resep.</p>
    @endif
</div>
