<?php

namespace App\Livewire\Dokter;

use App\Models\Obat;
use Livewire\Component;

class ObatIndex extends Component
{
    public $obats, $nama_obat, $kemasan, $harga;
    public $isOpen = false;
    public $isEdit = false;
    public $editingId;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->obats = Obat::latest()->get();
    }

    public function render()
    {
        return view('livewire.dokter.obat-index')
            ->layout('layouts.app');
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
    }

    public function resetForm()
    {
        $this->nama_obat = '';
        $this->kemasan = '';
        $this->harga = '';
        $this->editingId = null;
    }

    public function store()
    {
        $this->validate([
            'nama_obat' => 'required',
            'kemasan' => 'required',
            'harga' => 'required|numeric',
        ]);

        Obat::create([
            'nama_obat' => $this->nama_obat,
            'kemasan' => $this->kemasan,
            'harga' => $this->harga,
        ]);

        session()->flash('message', 'Obat berhasil ditambahkan.');
        $this->closeModal();
        $this->loadData();
    }

    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        $this->nama_obat = $obat->nama_obat;
        $this->kemasan = $obat->kemasan;
        $this->harga = $obat->harga;
        $this->editingId = $obat->id;
        $this->isEdit = true;
        $this->isOpen = true;
    }

    public function update()
    {
        $this->validate([
            'nama_obat' => 'required',
            'kemasan' => 'required',
            'harga' => 'required|numeric',
        ]);

        Obat::findOrFail($this->editingId)->update([
            'nama_obat' => $this->nama_obat,
            'kemasan' => $this->kemasan,
            'harga' => $this->harga,
        ]);

        session()->flash('message', 'Obat berhasil diperbarui.');
        $this->closeModal();
        $this->loadData();
    }

    public function delete($id)
    {
        Obat::destroy($id);
        session()->flash('message', 'Obat berhasil dihapus.');
        $this->loadData();
    }
}