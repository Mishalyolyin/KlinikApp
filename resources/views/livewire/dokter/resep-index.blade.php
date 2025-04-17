<div class="min-h-screen py-10 px-4 bg-white">
    <h1 class="text-2xl font-bold mb-6">Resep</h1>

    <div class="mb-4 flex justify-end">
        <button wire:click="openModal" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">+ Tambah Resep</button>
    </div>

    <table class="min-w-full table-auto border shadow bg-white text-center">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">Pasien</th>
                <th class="px-4 py-2">Tanggal Cek</th>
                <th class="px-4 py-2">Obat</th>
                <th class="px-4 py-2">Dosis</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reseps as $resep)
                <tr>
                    <td class="border px-4 py-2">{{ $resep->pasien->name }}</td>
                    <td class="border px-4 py-2">{{ $resep->tanggal_cek }}</td>
                    <td class="border px-4 py-2">{{ $resep->obat->nama_obat }}</td>
                    <td class="border px-4 py-2">{{ $resep->dosis }}</td>
                    <td class="border px-4 py-2 space-x-2">
                        <button wire:click="edit({{ $resep->id }})" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-sm">Edit</button>
                        <button wire:click="delete({{ $resep->id }})" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if ($isOpen)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded shadow-md w-full max-w-md">
                <h2 class="text-lg font-bold mb-4">{{ $isEdit ? 'Edit Resep' : 'Tambah Resep' }}</h2>
                <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}">
                    <div class="mb-4">
                        <label>Pasien</label>
                        <select wire:model="pasien_id" class="w-full border rounded px-3 py-2">
                            <option value="">Pilih Pasien</option>
                            @foreach ($pasiens as $pasien)
                                <option value="{{ $pasien->id }}">{{ $pasien->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label>Obat</label>
                        <select wire:model="obat_id" class="w-full border rounded px-3 py-2">
                            <option value="">Pilih Obat</option>
                            @foreach ($obats as $obat)
                                <option value="{{ $obat->id }}">{{ $obat->nama_obat }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label>Tanggal Cek</label>
                        <input type="date" wire:model="tanggal_cek" class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label>Dosis</label>
                        <input type="text" wire:model="dosis" class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="flex justify-end gap-2">
                        <button type="button" wire:click="closeModal" class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded">Batal</button>
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                            {{ $isEdit ? 'Update' : 'Simpan' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
