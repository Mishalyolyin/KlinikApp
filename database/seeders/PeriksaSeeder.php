<?php

namespace Database\Seeders;

use App\Models\Periksa;
use App\Models\User;
use Illuminate\Database\Seeder;

class PeriksaSeeder extends Seeder
{
    public function run(): void
    {
        $pasien1 = User::where('role', 'pasien')->first();
        $pasien2 = User::where('role', 'pasien')->skip(1)->first();

        if ($pasien1 && $pasien2) {
            Periksa::create([
                'pasien_id' => $pasien1->id,
                'keluhan' => 'Demam dan batuk sejak dua hari lalu',
                'tanggal' => now()->toDateString(),
                'status' => 'menunggu'
            ]);

            Periksa::create([
                'pasien_id' => $pasien2->id,
                'keluhan' => 'Sakit kepala dan mual',
                'tanggal' => now()->toDateString(),
                'status' => 'selesai'
            ]);
        }
    }
}
