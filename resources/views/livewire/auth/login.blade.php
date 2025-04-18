<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-blue-200 px-4">
    <div class="max-w-5xl w-full bg-white rounded-xl shadow-lg overflow-hidden grid grid-cols-1 md:grid-cols-2">
        {{-- Left Section --}}
        <div class="p-8 md:p-12 flex flex-col justify-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Masuk sebagai {{ ucfirst($role) }}</h2>
            <p class="text-gray-600 mb-6">Masukkan email dan password Anda untuk login ke sistem.</p>

            @if (session('error'))
                <div class="mb-4 text-sm text-red-600 bg-red-100 rounded px-4 py-2">
                    {{ session('error') }}
                </div>
            @endif

            <form wire:submit.prevent="login" class="space-y-4">
                <input type="hidden" wire:model="role">

                <input type="email" wire:model.defer="email" placeholder="Email"
                       class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" required>

                <input type="password" wire:model.defer="password" placeholder="Password"
                       class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" required>

                <label class="flex items-center text-sm text-gray-600">
                    <input type="checkbox" wire:model="remember" class="mr-2">
                    Ingat saya
                </label>

                <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg transition">
                    Login
                </button>
            </form>

            <p class="text-sm text-gray-500 mt-6">
                Belum punya akun?
                <a href="{{ route('register.dokter') }}" class="text-blue-600 hover:underline">Daftar di sini</a>
            </p>
        </div>

        {{-- Right Section --}}
        <div class="bg-gradient-to-br from-blue-600 to-blue-400 text-white flex items-center justify-center p-8">
            <div class="text-center">
                <img src="https://cdn-icons-png.flaticon.com/512/5087/5087579.png"
                     class="w-32 mx-auto mb-4" alt="Login Illustration">
                <h3 class="text-2xl font-bold">Klinik App</h3>
                <p class="text-sm mt-2">Platform login dokter & pasien</p>
            </div>
        </div>
    </div>
</div>
