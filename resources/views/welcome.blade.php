<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang | Klinik App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f3f4f6;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">

    <div class="w-full max-w-5xl mx-auto bg-white shadow-xl rounded-xl overflow-hidden grid grid-cols-1 md:grid-cols-2">
        {{-- Kiri (Welcome Section) --}}
        <div class="bg-white p-10 flex flex-col justify-center">
            <h1 class="text-2xl font-bold text-gray-800 mb-2">WELCOME BACK!</h1>
            <p class="text-gray-600 mb-6">Masuk sebagai Dokter atau Pasien untuk melanjutkan</p>
            
            <div class="space-y-4">
                <a href="{{ route('login.dokter') }}"
                   class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded transition">
                    Login Sebagai Dokter
                </a>
                <a href="{{ route('login.pasien') }}"
                   class="block w-full text-center bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded transition">
                    Login Sebagai Pasien
                </a>
            </div>
        </div>

        {{-- Kanan (Gambar / Ilustrasi) --}}
        <div class="bg-gradient-to-br from-blue-600 to-blue-400 text-white flex items-center justify-center relative">
            <div class="text-center p-8">
                <img src="https://cdn-icons-png.flaticon.com/512/5087/5087579.png" class="w-40 mx-auto mb-6" alt="Login Illustration">
                <h2 class="text-3xl font-bold">Klinik App</h2>
                <p class="text-sm mt-2">Akses cepat dan aman untuk kebutuhan medis Anda</p>
            </div>
        </div>
    </div>

</body>
</html>
