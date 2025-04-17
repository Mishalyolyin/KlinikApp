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

// ------------------------------------------
// 🏠 HALAMAN AWAL
// ------------------------------------------
Route::get('/', function () {
    return view('welcome');
});

// Redirect /dashboard ke dashboard dokter
Route::get('/dashboard', function () {
    return redirect()->route('dokter.dashboard');
});

// ------------------------------------------
// 👤 ROUTE USER UMUM (EDIT PROFIL, LOGOUT, DLL)
// ------------------------------------------
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ------------------------------------------
// 🧐‍⚕️ ROUTE KHUSUS DOKTER
// ------------------------------------------
Route::middleware(['auth', 'role:dokter'])->prefix('dokter')->name('dokter.')->group(function () {
    Route::get('/dashboard', DokterDashboard::class)->name('dashboard');
    Route::get('/obat', ObatIndex::class)->name('obat');
    Route::get('/resep/{pasien_id?}', ResepIndex::class)->name('resep');
    Route::get('/pasien', PasienIndex::class)->name('pasien');
    Route::get('/pasien/{id}/resep', PasienRiwayatResep::class)->name('pasien.resep');
});

// ------------------------------------------
// 🧑‍💼 ROUTE KHUSUS PASIEN
// ------------------------------------------
Route::middleware(['auth', 'role:pasien'])->prefix('pasien')->name('pasien.')->group(function () {
    Route::get('/dashboard', [PasienController::class, 'index'])->name('dashboard');
    // Tambahkan fitur lain untuk pasien di sini
});

// ------------------------------------------
// 🔐 LOGIN & REGISTER KHUSUS PER ROLE
// ------------------------------------------
Route::get('/login', function () {
    return view('auth.select-login');
})->name('login');

Route::get('/login/dokter', [AuthenticatedSessionController::class, 'createDokter'])->name('login.dokter');
Route::get('/login/pasien', [AuthenticatedSessionController::class, 'createPasien'])->name('login.pasien');

Route::get('/register/dokter', [RegisteredUserController::class, 'createDokter'])->name('register.dokter');
Route::get('/register/pasien', [RegisteredUserController::class, 'createPasien'])->name('register.pasien');

// Route default auth dari Breeze
require __DIR__.'/auth.php';
