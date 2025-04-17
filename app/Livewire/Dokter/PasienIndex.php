<?php

namespace App\Livewire\Dokter;

use App\Models\Periksa;
use Livewire\Component;

class PasienIndex extends Component
{
    public $pasiens = [];

    public function mount()
    {
        $this->pasiens = Periksa::with('pasien')
            ->whereDate('tanggal', now())
            ->orderByRaw("FIELD(status, 'menunggu', 'selesai')")
            ->get();
    }

    public function render()
    {
        return view('livewire.dokter.pasien-index')
            ->layout('layouts.app');
    }
}
