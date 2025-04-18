<?php

namespace Database\Seeders;

use App\Models\Periksa;
use App\Models\User;
use Illuminate\Database\Seeder;

class PeriksaSeeder extends Seeder
{
    public function run(): void
    {
        $pasien1 = User::where('email', 'pasien1@example.com')->first();
        $pasien2 = User::where('email', 'pasien2@example.com')->first();

        if ($pasien1) {
            Periksa::create([
                'pasien_id' => $pasien1->id,
                'nama' => $pasien1->name,
                'umur' => 25,
                'berat_badan' => 60,
                'keluhan' => 'Demam dan batuk sejak dua hari lalu',
                'tanggal' => now()->toDateString(),
                'status' => 'menunggu',
            ]);
        }

        if ($pasien2) {
            Periksa::create([
                'pasien_id' => $pasien2->id,
                'nama' => $pasien2->name,
                'umur' => 32,
                'berat_badan' => 72,
                'keluhan' => 'Sakit kepala dan mual',
                'tanggal' => now()->toDateString(),
                'status' => 'selesai',
            ]);
        }
    }
}
