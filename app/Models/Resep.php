<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;

    protected $fillable = ['pasien_id', 'obat_id', 'tanggal_cek', 'dosis'];

    public function pasien()
    {
        return $this->belongsTo(User::class, 'pasien_id');
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }
}

