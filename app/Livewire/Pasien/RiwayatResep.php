<?php

namespace App\Livewire\Pasien;

use Livewire\Component;
use App\Models\Resep;
use Illuminate\Support\Facades\Auth;

class RiwayatResep extends Component
{
    public $reseps = [];

    public function mount()
    {
        $this->reseps = Resep::with(['obat', 'dokter'])
            ->where('pasien_id', Auth::id())
            ->latest()
            ->get();
    }

    public function render()
    {
        return view('livewire.pasien.riwayat-resep')
            ->layout('layouts.app');
    }
}

