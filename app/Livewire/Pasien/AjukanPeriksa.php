<?php

namespace App\Livewire\Pasien;

use Livewire\Component;
use App\Models\Periksa;
use Illuminate\Support\Facades\Auth;

class AjukanPeriksa extends Component
{
    public $nama;
    public $umur;
    public $berat_badan;
    public $keluhan;
    public $showForm = false;

    protected $rules = [
        'nama' => 'required|string|max:255',
        'umur' => 'required|numeric|min:1',
        'berat_badan' => 'required|numeric|min:1',
        'keluhan' => 'required|string|max:255',
    ];

    public function submit()
    {
        $this->validate();

        Periksa::create([
            'pasien_id' => Auth::id(),
            'nama' => $this->nama,
            'umur' => $this->umur,
            'berat_badan' => $this->berat_badan,
            'keluhan' => $this->keluhan,
            'tanggal' => now()->toDateString(),
            'status' => 'menunggu',
        ]);

        session()->flash('success', 'Keluhan berhasil diajukan.');

        $this->reset(['nama', 'umur', 'berat_badan', 'keluhan', 'showForm']);
    }

    public function render()
    {
        $pasienList = Periksa::where('pasien_id', Auth::id())
            ->latest()->get();

        return view('livewire.pasien.ajukan-periksa', compact('pasienList'))
            ->layout('layouts.app');
    }
}