<div class="p-6 max-w-6xl mx-auto">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Riwayat Resep</h2>

    @if($reseps->isEmpty())
        <div class="bg-yellow-100 text-yellow-800 px-4 py-3 rounded-md shadow-sm">
            Belum ada resep yang diberikan oleh dokter.
        </div>
    @else
        <div class="overflow-x-auto rounded-lg shadow">
            <table class="min-w-full table-auto text-sm bg-white">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold">Tanggal</th>
                        <th class="px-6 py-3 text-left font-semibold">Nama Dokter</th>
                        <th class="px-6 py-3 text-left font-semibold">Nama Obat</th>
                        <th class="px-6 py-3 text-left font-semibold">Dosis</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-gray-700">
                    @foreach($reseps as $resep)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-3 whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($resep->tanggal_cek)->translatedFormat('d F Y') }}
                            </td>
                            <td class="px-6 py-3 whitespace-nowrap">
                                {{ $resep->dokter->name ?? '-' }}
                            </td>
                            <td class="px-6 py-3 whitespace-nowrap">
                                {{ $resep->obat->nama }}
                            </td>
                            <td class="px-6 py-3 whitespace-nowrap">
                                {{ $resep->dosis }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
