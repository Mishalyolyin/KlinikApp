<?php

namespace App\Livewire\Dokter;

use Livewire\Component;
use App\Models\User;
use App\Models\Resep;

class PasienRiwayatResep extends Component
{
    public $pasien;
    public $reseps = [];

    public function mount($id)
    {
        $this->pasien = User::findOrFail($id);
        $this->reseps = Resep::with('obat')
            ->where('pasien_id', $id)
            ->orderBy('tanggal_cek', 'desc')
            ->get();
    }

    public function render()
    {
        return view('livewire.dokter.pasien-riwayat-resep')
            ->layout('layouts.app');
    }
}
