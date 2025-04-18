<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Pasien - Klinik App</title>
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
        <h2 class="text-2xl font-bold text-gray-800 mb-4">REGISTER PASIEN</h2>
        <p class="text-gray-600 mb-6">Silakan isi data untuk mendaftar sebagai <strong>Pasien</strong></p>

        @if ($errors->any())
            <div class="mb-4 text-sm text-red-600">
                <ul class="list-disc ml-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.pasien') }}" class="space-y-4">
            @csrf
            <input type="hidden" name="role" value="pasien">

            {{-- Name --}}
            <input type="text" name="name" placeholder="Nama lengkap"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required autofocus>

            {{-- Email --}}
            <input type="email" name="email" placeholder="Alamat email"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>

            {{-- Password --}}
            <input type="password" name="password" placeholder="Password"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>

            {{-- Confirm --}}
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>

            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                Daftar
            </button>
        </form>

        <p class="text-sm text-gray-500 mt-6">
            Sudah punya akun?
            <a href="{{ route('login.pasien') }}" class="text-blue-600 hover:underline">Login disini</a>
        </p>
    </div>

    {{-- Kanan --}}
    <div class="bg-gradient-to-br from-blue-600 to-blue-400 text-white flex items-center justify-center">
        <div class="text-center px-8">
            <img src="https://cdn-icons-png.flaticon.com/512/706/706797.png"
                 class="w-40 mx-auto mb-6" alt="Register Illustration">
            <h3 class="text-2xl font-bold">Selamat Datang</h3>
            <p class="text-sm mt-2">Pendaftaran untuk Pasien Klinik</p>
        </div>
    </div>
</div>

</body>
</html>
