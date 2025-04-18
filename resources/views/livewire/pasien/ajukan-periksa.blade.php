<div class="max-w-6xl mx-auto p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">
        Halo, {{ auth()->user()->name }}! Apa keluhan yang kamu rasakan hari ini?
    </h2>

    <div class="flex flex-col items-center mb-6">
        <img src="https://cdn-icons-png.flaticon.com/512/2950/2950651.png"
             alt="Customer Service" class="w-32 mb-4">
        <p class="text-sm text-gray-600 text-center mb-4">
            Silakan klik tombol di bawah ini untuk mengisi keluhan dan membantu dokter mendiagnosa penyakitmu.
        </p>
        <button wire:click="$set('showForm', true)"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded shadow">
            Ajukan Keluhan
        </button>
    </div>

    @if (session()->has('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Modal Form --}}
    @if($showForm)
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg">
            <h3 class="text-lg font-semibold mb-4">Form Keluhan</h3>

            <form wire:submit.prevent="submit" class="space-y-4">
                <div>
                    <label class="block text-sm mb-1">Nama</label>
                    <input type="text" wire:model="nama" class="w-full border rounded px-3 py-2">
                    @error('nama') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm mb-1">Umur</label>
                    <input type="number" wire:model="umur" class="w-full border rounded px-3 py-2">
                    @error('umur') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm mb-1">Berat Badan (kg)</label>
                    <input type="number" wire:model="berat_badan" class="w-full border rounded px-3 py-2">
                    @error('berat_badan') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm mb-1">Keluhan</label>
                    <textarea wire:model="keluhan" class="w-full border rounded px-3 py-2"></textarea>
                    @error('keluhan') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="flex justify-end space-x-2">
                    <button type="button" wire:click="$set('showForm', false)"
                            class="px-4 py-2 border rounded text-gray-700 hover:bg-gray-100">
                        Batal
                    </button>
                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">
                        Kirim
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif

    {{-- Tabel List Keluhan --}}
    <div class="mt-10 bg-white shadow rounded-lg overflow-x-auto">
        <table class="min-w-full table-auto text-sm text-left">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Umur</th>
                    <th class="px-4 py-3">Berat Badan (kg)</th>
                    <th class="px-4 py-3">Keluhan</th>
                    <th class="px-4 py-3">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($pasienList as $index => $pasien)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2">{{ $pasien->nama }}</td>
                        <td class="px-4 py-2">{{ $pasien->umur }}</td>
                        <td class="px-4 py-2">{{ $pasien->berat_badan }}</td>
                        <td class="px-4 py-2">{{ $pasien->keluhan }}</td>
                        <td class="px-4 py-2">
                            <span class="px-2 py-1 rounded text-xs font-semibold
                                {{ $pasien->status === 'menunggu' ? 'bg-yellow-100 text-yellow-700' : 'bg-green-100 text-green-700' }}">
                                {{ ucfirst($pasien->status) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-500">Belum ada keluhan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
