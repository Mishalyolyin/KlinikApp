<?php

namespace App\Livewire\Dokter;

use App\Models\Periksa;
use Livewire\Component;

class PasienHariIni extends Component
{
    public $daftarPasien = [];

    public function mount()
    {
        $this->daftarPasien = Periksa::with('pasien')
            ->whereDate('tanggal', now()->toDateString())
            ->where('status', 'menunggu')
            ->latest()
            ->get();
    }

    public function render()
    {
        return view('livewire.dokter.pasien-hari-ini');
    }
}
