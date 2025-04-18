{{-- resources/views/layouts/navigation.blade.php --}}
<aside class="w-64 bg-gray-900 text-white flex flex-col">
    {{-- User Info --}}
    <div x-data="{ open: false }" class="relative p-6 border-b border-gray-700">
        @if(auth()->check())
            <button @click="open = !open" class="flex items-center space-x-4 w-full text-left focus:outline-none">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=0D8ABC&color=fff"
                     class="w-14 h-14 rounded-full" alt="Avatar">
                <div>
                    <div class="text-lg font-semibold">{{ auth()->user()->name }}</div>
                    <div class="text-sm text-gray-300 capitalize">{{ auth()->user()->role }}</div>
                </div>
            </button>

            {{-- Dropdown --}}
            <div x-show="open" @click.outside="open = false" x-cloak
                 class="absolute top-full left-6 mt-2 bg-white text-gray-900 rounded shadow-md w-48 z-50">
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100">Profil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">Logout</button>
                </form>
            </div>
        @else
            <div class="text-gray-300">Belum login</div>
        @endif
    </div>

    {{-- Menu Navigasi --}}
    <nav class="flex-1 px-4 py-6 text-base space-y-2">
        {{-- Dashboard --}}
        <a href="{{ auth()->user()->role === 'dokter' ? route('dokter.dashboard') : route('pasien.dashboard') }}"
           class="block px-4 py-3 rounded-lg hover:bg-gray-700
           {{ request()->routeIs('dokter.dashboard') || request()->routeIs('pasien.dashboard') ? 'bg-gray-800' : '' }}">
            Dashboard
        </a>

        {{-- Menu khusus Dokter --}}
        @if(auth()->user()->role === 'dokter')
            <a href="{{ route('dokter.obat') }}"
               class="block px-4 py-3 rounded-lg hover:bg-gray-700 {{ request()->routeIs('dokter.obat') ? 'bg-gray-800' : '' }}">
                Obat
            </a>
            <a href="{{ route('dokter.resep') }}"
               class="block px-4 py-3 rounded-lg hover:bg-gray-700 {{ request()->routeIs('dokter.resep') ? 'bg-gray-800' : '' }}">
                Resep
            </a>
            <a href="{{ route('dokter.pasien') }}"
               class="block px-4 py-3 rounded-lg hover:bg-gray-700 {{ request()->routeIs('dokter.pasien') ? 'bg-gray-800' : '' }}">
                Pasien
            </a>
        @endif

        {{-- Menu khusus Pasien --}}
        @if(auth()->user()->role === 'pasien')
            <a href="{{ route('pasien.ajukan-periksa') }}"
               class="block px-4 py-3 rounded-lg hover:bg-gray-700 {{ request()->routeIs('pasien.ajukan-periksa') ? 'bg-gray-800' : '' }}">
                Ajukan Periksa
            </a>
            <a href="{{ route('pasien.riwayat-resep') }}"
               class="block px-4 py-3 rounded-lg hover:bg-gray-700 {{ request()->routeIs('pasien.riwayat-resep') ? 'bg-gray-800' : '' }}">
                Riwayat Resep
            </a>
        @endif
    </nav>
</aside>
