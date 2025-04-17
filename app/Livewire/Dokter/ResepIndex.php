<?php

namespace App\Livewire\Dokter;

use App\Models\Obat;
use App\Models\Resep;
use App\Models\User;
use App\Models\Periksa;
use Livewire\Component;

class ResepIndex extends Component
{
    public $reseps, $pasien_id, $obat_id, $tanggal_cek, $dosis, $resep_id;
    public $isOpen = false;
    public $isEdit = false;

    public function mount($pasien_id = null)
    {
        $this->reseps = Resep::with(['pasien', 'obat'])->latest()->get();

        if ($pasien_id) {
            $this->pasien_id = $pasien_id;

            // Ubah status periksa jadi selesai kalau ada yang menunggu hari ini
            $periksa = Periksa::where('pasien_id', $pasien_id)
                ->whereDate('tanggal', now()->toDateString())
                ->where('status', 'menunggu')
                ->first();

            if ($periksa) {
                $periksa->update(['status' => 'selesai']);
            }

            // Otomatis buka modal resep
            $this->isOpen = true;
        }
    }

    public function render()
    {
        return view('livewire.dokter.resep-index', [
            'pasiens' => User::where('role', 'pasien')->get(),
            'obats' => Obat::all()
        ])->layout('layouts.app');
    }

    public function openModal()
    {
        $this->resetForm();
        $this->isEdit = false;
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->pasien_id = '';
        $this->obat_id = '';
        $this->tanggal_cek = '';
        $this->dosis = '';
        $this->resep_id = null;
        $this->isEdit = false;
    }

    public function store()
    {
        $this->validate([
            'pasien_id' => 'required|exists:users,id',
            'obat_id' => 'required|exists:obats,id',
            'tanggal_cek' => 'required|date',
            'dosis' => 'required|string'
        ]);

        Resep::create([
            'pasien_id' => $this->pasien_id,
            'obat_id' => $this->obat_id,
            'tanggal_cek' => $this->tanggal_cek,
            'dosis' => $this->dosis,
        ]);

        session()->flash('message', 'Resep berhasil ditambahkan.');
        $this->closeModal();
        $this->mount(); // Refresh data
    }

    public function edit($id)
    {
        $resep = Resep::findOrFail($id);
        $this->resep_id = $resep->id;
        $this->pasien_id = $resep->pasien_id;
        $this->obat_id = $resep->obat_id;
        $this->tanggal_cek = $resep->tanggal_cek;
        $this->dosis = $resep->dosis;
        $this->isEdit = true;
        $this->isOpen = true;
    }

    public function update()
    {
        $this->validate([
            'pasien_id' => 'required|exists:users,id',
            'obat_id' => 'required|exists:obats,id',
            'tanggal_cek' => 'required|date',
            'dosis' => 'required|string'
        ]);

        $resep = Resep::findOrFail($this->resep_id);
        $resep->update([
            'pasien_id' => $this->pasien_id,
            'obat_id' => $this->obat_id,
            'tanggal_cek' => $this->tanggal_cek,
            'dosis' => $this->dosis,
        ]);

        session()->flash('message', 'Resep berhasil diperbarui.');
        $this->closeModal();
        $this->mount();
    }

    public function delete($id)
    {
        Resep::destroy($id);
        $this->mount();
    }
}
