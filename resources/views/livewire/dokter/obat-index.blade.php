<div class="min-h-screen flex flex-col items-center justify-start pt-10 bg-white">
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4 w-full max-w-4xl text-center">
            {{ session('message') }}
        </div>
    @endif

    <div class="w-full max-w-4xl px-4">
    <div class="flex justify-end mb-4">
        <button wire:click="openModal"
            class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded shadow">
            + Tambah Obat
        </button>
    </div>

    <div class="overflow-x-auto">
        <!-- table dimulai di sini -->

        <div class="overflow-x-auto">
            <table class="min-w-full table-auto bg-white border shadow rounded text-center">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">Kemasan</th>
                        <th class="px-4 py-2">Harga</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($obats as $obat)
                        <tr>
                            <td class="border px-4 py-2">{{ $obat->nama_obat }}</td>
                            <td class="border px-4 py-2">{{ $obat->kemasan }}</td>
                            <td class="border px-4 py-2">Rp{{ number_format($obat->harga, 0, ',', '.') }}</td>
                            <td class="border px-4 py-2 space-x-2">
                                <button wire:click="edit({{ $obat->id }})"
                                    class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-1 px-3 rounded text-sm">
                                    Edit
                                </button>
                                <button wire:click="delete({{ $obat->id }})"
                                    class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded text-sm">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-4 text-gray-500">Belum ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if ($isOpen)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded shadow-md w-full max-w-md">
                <h2 class="text-lg font-bold mb-4">{{ $isEdit ? 'Edit Obat' : 'Tambah Obat' }}</h2>
                <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}">
                    <div class="mb-4">
                        <label>Nama Obat</label>
                        <input wire:model="nama_obat" type="text" class="w-full border rounded px-3 py-2">
                        @error('nama_obat') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label>Kemasan</label>
                        <input wire:model="kemasan" type="text" class="w-full border rounded px-3 py-2">
                        @error('kemasan') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label>Harga</label>
                        <input wire:model="harga" type="number" class="w-full border rounded px-3 py-2">
                        @error('harga') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button type="button" wire:click="closeModal" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>