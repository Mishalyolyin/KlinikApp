{{-- resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Klinik App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="w-full max-w-5xl bg-white rounded-xl shadow-xl overflow-hidden grid grid-cols-1 md:grid-cols-2">
    {{-- Kiri --}}
    <div class="p-10 flex flex-col justify-center">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">SIGN IN</h2>
        <p class="text-gray-600 mb-6">
            Masukkan email dan password untuk masuk
            @if(isset($role))
                sebagai <strong class="capitalize">{{ $role }}</strong>
            @endif
        </p>

        @if(session('status'))
            <div class="mb-4 text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <input type="hidden" name="role" value="{{ $role ?? '' }}">

            {{-- Email --}}
            <div>
                <input type="email" name="email" required autofocus
                       placeholder="Masukkan email"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            {{-- Password --}}
            <div>
                <input type="password" name="password" required
                       placeholder="Masukkan password"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            {{-- Remember --}}
            <div class="flex items-center">
                <input id="remember_me" type="checkbox" class="mr-2" name="remember">
                <label for="remember_me" class="text-sm text-gray-600">Ingat saya</label>
            </div>

            {{-- Submit --}}
            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                Login
            </button>
        </form>

        {{-- Register --}}
        <p class="text-sm text-gray-500 mt-6">
            Belum punya akun?
            @if($role === 'dokter')
                <a href="{{ route('register.dokter') }}" class="text-blue-600 hover:underline">Daftar sebagai Dokter</a>
            @elseif($role === 'pasien')
                <a href="{{ route('register.pasien') }}" class="text-blue-600 hover:underline">Daftar sebagai Pasien</a>
            @else
                <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Daftar</a>
            @endif
        </p>
    </div>

    {{-- Kanan --}}
    <div class="bg-gradient-to-br from-blue-600 to-blue-400 text-white flex items-center justify-center">
        <div class="text-center px-8">
            <img src="https://cdn-icons-png.flaticon.com/512/5087/5087579.png"
                 class="w-40 mx-auto mb-6" alt="Login Illustration">
            <h3 class="text-2xl font-bold">Klinik App</h3>
            <p class="text-sm mt-2">Platform login dokter & pasien</p>
        </div>
    </div>
</div>

</body>
</html>
