<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Tampilan form register default
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Tampilan register untuk dokter
     */
    public function createDokter(): View
    {
        return view('auth.register', ['role' => 'dokter']);
    }

    /**
     * Tampilan register untuk pasien
     */
    public function createPasien(): View
    {
        return view('auth.register', ['role' => 'pasien']);
    }

    /**
     * Proses register
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:pasien,dokter'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        event(new Registered($user));
        Auth::login($user);

        // Redirect berdasarkan role
        if ($user->role === 'dokter') {
            return redirect()->route('dokter.dashboard');
        } elseif ($user->role === 'pasien') {
            return redirect()->route('pasien.dashboard');
        }

        return redirect('/'); // fallback redirect (seharusnya tidak pernah terpanggil)
    }
}
