<?php

namespace App\Livewire\Dokter;

use App\Models\Obat;
use App\Models\Resep;
use App\Models\Periksa;
use Livewire\Component;
use Carbon\Carbon;

class Dashboard extends Component
{
    public $jumlahObat;
    public $jumlahResep;
    public $pasienHariIni;
    public $pasienMenunggu = [];

    public function mount()
    {
        $this->jumlahObat = Obat::count();
        $this->jumlahResep = Resep::count();
        $this->pasienHariIni = Periksa::whereDate('tanggal', Carbon::today())->count();

        $this->pasienMenunggu = Periksa::with('pasien')
            ->whereDate('tanggal', Carbon::today())
            ->where('status', 'menunggu')
            ->orderBy('tanggal', 'asc')
            ->get();
    }

    public function render()
    {
        return view('livewire.dokter.dashboard')->layout('layouts.app');

    }
}
