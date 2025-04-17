@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard Pasien</h1>
        <p>Selamat datang, {{ auth()->user()->nama }}!</p>
    </div>
@endsection
