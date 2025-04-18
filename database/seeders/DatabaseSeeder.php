<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Periksa;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 3 Dokter
        User::create([
            'name' => 'dr. Andi Pratama',
            'email' => 'andi@klinikapp.com',
            'password' => Hash::make('12345678'),
            'role' => 'dokter',
        ]);

        User::create([
            'name' => 'dr. Sinta Lestari',
            'email' => 'sinta@klinikapp.com',
            'password' => Hash::make('12345678'),
            'role' => 'dokter',
        ]);

        User::create([
            'name' => 'dr. Budi Santoso',
            'email' => 'budi@klinikapp.com',
            'password' => Hash::make('12345678'),
            'role' => 'dokter',
        ]);

        // 3 Pasien
        $pasien1 = User::create([
            'name' => 'Rina Kusuma',
            'email' => 'rina@klinikapp.com',
            'password' => Hash::make('12345678'),
            'role' => 'pasien',
        ]);

        $pasien2 = User::create([
            'name' => 'Joko Wibowo',
            'email' => 'joko@klinikapp.com',
            'password' => Hash::make('12345678'),
            'role' => 'pasien',
        ]);

        $pasien3 = User::create([
            'name' => 'Ayu Maharani',
            'email' => 'ayu@klinikapp.com',
            'password' => Hash::make('12345678'),
            'role' => 'pasien',
        ]);

        // Contoh data Periksa
        Periksa::create([
            'pasien_id' => $pasien1->id,
            'nama' => $pasien1->name,
            'umur' => 28,
            'berat_badan' => 55,
            'keluhan' => 'Demam dan batuk sejak dua hari lalu',
            'tanggal' => now()->toDateString(),
            'status' => 'menunggu',
        ]);

        Periksa::create([
            'pasien_id' => $pasien2->id,
            'nama' => $pasien2->name,
            'umur' => 35,
            'berat_badan' => 68,
            'keluhan' => 'Sakit kepala dan mual',
            'tanggal' => now()->toDateString(),
            'status' => 'selesai',
        ]);

        Periksa::create([
            'pasien_id' => $pasien3->id,
            'nama' => $pasien3->name,
            'umur' => 24,
            'berat_badan' => 50,
            'keluhan' => 'Nyeri otot dan lemas',
            'tanggal' => now()->toDateString(),
            'status' => 'menunggu',
        ]);

    }
}
