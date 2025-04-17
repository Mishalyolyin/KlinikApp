@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard Dokter</h1>
        <p>Halo Dokter, {{ auth()->user()->nama }}!</p>
    </div>
@endsection
