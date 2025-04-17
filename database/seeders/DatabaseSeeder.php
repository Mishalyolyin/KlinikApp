<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat akun dokter
        User::factory()->create([
            'name' => 'Dr. Steven',
            'email' => 'dokter1@example.com',
            'password' => bcrypt('password'), 
            'role' => 'dokter',
        ]);

        // Buat 2 akun pasien
        User::factory()->create([
            'name' => 'Pasien Satu',
            'email' => 'pasien1@example.com',
            'password' => bcrypt('password'),
            'role' => 'pasien',
        ]);

        User::factory()->create([
            'name' => 'Pasien Dua',
            'email' => 'pasien2@example.com',
            'password' => bcrypt('password'),
            'role' => 'pasien',
        ]);

        // Jalankan seeder periksa
        $this->call([
            PeriksaSeeder::class,
        ]);
    }
}
