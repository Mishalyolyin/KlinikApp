<?php

namespace App\Livewire\Pasien;

use App\Models\Resep;
use Livewire\Component;

class ResepDetail extends Component
{
    public $resep;

    public function mount($id)
    {
        $this->resep = Resep::with(['obat', 'dokter'])
            ->where('id', $id)
            ->where('pasien_id', auth()->id())
            ->firstOrFail();
    }

    public function render()
    {
        return view('livewire.pasien.resep-detail')->layout('layouts.app');
    }
}
