<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Menampilkan pemilihan login role
     */
    public function create(): View
    {
        return view('auth.select-login'); // menampilkan modal/pilihan login
    }

    /**
     * Tampilan login untuk dokter
     */
    public function createDokter(): View
    {
        return view('auth.login', ['role' => 'dokter']);
    }

    /**
     * Tampilan login untuk pasien
     */
    public function createPasien(): View
    {
        return view('auth.login', ['role' => 'pasien']);
    }

    /**
     * Proses login
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->role === 'dokter') {
            return redirect()->route('dokter.dashboard');
        }

        if ($user->role === 'pasien') {
            return redirect()->route('pasien.dashboard');
        }

        return redirect()->route('dashboard'); // fallback jika role tidak dikenali
    }

    /**
     * Proses logout
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
