<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Livewire\Dokter\ObatIndex;
use App\Livewire\Dokter\Dashboard as DokterDashboard;
use App\Livewire\Dokter\ResepIndex;
use App\Livewire\Dokter\PasienIndex;
use App\Livewire\Dokter\PasienRiwayatResep;
use App\Livewire\Pasien\Dashboard as PasienDashboard;
use App\Livewire\Pasien\RiwayatResep;
use App\Livewire\Pasien\AjukanPeriksa;
use App\Livewire\Auth\Login;

// ------------------------------------------
// 🏠 HALAMAN AWAL
// ------------------------------------------
Route::get('/', function () {
    return view('welcome');
});

// Redirect /dashboard ke dashboard sesuai role
Route::get('/dashboard', function () {
    if (auth()->user()?->role === 'dokter') {
        return redirect()->route('dokter.dashboard');
    } elseif (auth()->user()?->role === 'pasien') {
        return redirect()->route('pasien.dashboard');
    }
    return redirect('/');
})->middleware(['auth'])->name('dashboard');

// ------------------------------------------
// 👤 ROUTE USER UMUM
// ------------------------------------------
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ------------------------------------------
// 👨‍⚕️ ROUTE KHUSUS DOKTER
// ------------------------------------------
Route::middleware(['auth', 'role:dokter'])->prefix('dokter')->name('dokter.')->group(function () {
    Route::get('/dashboard', DokterDashboard::class)->name('dashboard');
    Route::get('/obat', ObatIndex::class)->name('obat');
    Route::get('/resep/{pasien_id?}', ResepIndex::class)->name('resep');
    Route::get('/pasien', PasienIndex::class)->name('pasien');
    Route::get('/pasien/{id}/resep', PasienRiwayatResep::class)->name('pasien.resep');
});

// ------------------------------------------
// 🧑‍⚕️ ROUTE KHUSUS PASIEN
// ------------------------------------------
Route::middleware(['auth', 'role:pasien'])->prefix('pasien')->name('pasien.')->group(function () {
    Route::get('/dashboard', PasienDashboard::class)->name('dashboard');
    Route::get('/riwayat-resep', RiwayatResep::class)->name('riwayat-resep');
    Route::get('/ajukan-periksa', AjukanPeriksa::class)->name('ajukan-periksa');
});

// ------------------------------------------
// 🔐 LOGIN & REGISTER (Livewire)
// ------------------------------------------
Route::get('/login/dokter', Login::class)->name('login.dokter');
Route::get('/login/pasien', Login::class)->name('login.pasien');
Route::get('/login', fn () => view('auth.select-login'))->name('login');

Route::get('/register/dokter', [RegisteredUserController::class, 'createDokter'])->name('register.dokter');
Route::get('/register/pasien', [RegisteredUserController::class, 'createPasien'])->name('register.pasien');
Route::post('/register/pasien', [RegisteredUserController::class, 'store'])->name('register.pasien');

require __DIR__.'/auth.php';