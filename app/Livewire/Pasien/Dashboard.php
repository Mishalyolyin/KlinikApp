<?php

namespace App\Livewire\Pasien;

use Livewire\Component;
use App\Models\Resep;

class Dashboard extends Component
{
    public function render()
    {
        $reseps = Resep::with(['dokter', 'obat'])
                    ->where('pasien_id', auth()->id())
                    ->latest()
                    ->get();

        return view('livewire.pasien.dashboard', compact('reseps'))
            ->layout('layouts.app');
    }
}
