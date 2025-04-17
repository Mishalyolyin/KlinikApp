@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded shadow w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Pilih Login Sebagai</h2>
        <div class="flex flex-col space-y-4">
            <a href="{{ route('login.dokter') }}"
               class="bg-blue-600 text-white py-2 px-4 rounded text-center hover:bg-blue-700">
                Dokter
            </a>
            <a href="{{ route('login.pasien') }}"
               class="bg-green-600 text-white py-2 px-4 rounded text-center hover:bg-green-700">
                Pasien
            </a>
        </div>
    </div>
</div>
@endsection
