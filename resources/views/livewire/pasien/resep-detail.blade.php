<div class="p-6 max-w-xl mx-auto bg-white shadow rounded-lg">
    <h2 class="text-xl font-semibold mb-4">Detail Resep</h2>

    <div class="space-y-2 text-gray-700">
        <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($resep->tanggal_cek)->format('d M Y') }}</p>
        <p><strong>Nama Dokter:</strong> {{ $resep->dokter->name ?? '-' }}</p>
        <p><strong>Obat:</strong> {{ $resep->obat->nama }}</p>
        <p><strong>Dosis:</strong> {{ $resep->dosis }}</p>
    </div>

    <a href="{{ route('pasien.dashboard') }}"
       class="inline-block mt-6 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
        Kembali
    </a>
</div>
