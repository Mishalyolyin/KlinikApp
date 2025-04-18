<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;
    public $role = 'dokter'; // default dokter, bisa dibuat dinamis juga

    public function login()
    {
        $credentials = ['email' => $this->email, 'password' => $this->password];

        if (Auth::attempt($credentials, $this->remember)) {
            if (Auth::user()->role !== $this->role) {
                Auth::logout();
                return session()->flash('error', 'Akun tidak sesuai dengan peran yang dipilih.');
            }

            session()->regenerate();

            return redirect()->route($this->role . '.dashboard');
        }

        session()->flash('error', 'Email atau password salah.');
    }

    public function mount()
    {
        if (request()->is('login/pasien')) {
            $this->role = 'pasien';
        } elseif (request()->is('login/dokter')) {
            $this->role = 'dokter';
        }
    }

    public function render()
    {
        return view('livewire.auth.login')
        ->layout('layouts.guest');   // pastikan layout ini ada
    }
}
