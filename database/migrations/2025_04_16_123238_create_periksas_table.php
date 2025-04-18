<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('periksas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained('users')->onDelete('cascade');
            $table->string('nama'); // nama pasien
            $table->integer('umur'); // umur pasien
            $table->float('berat_badan'); // berat badan pasien
            $table->text('keluhan'); // keluhan penyakit
            $table->date('tanggal'); // tanggal periksa
            $table->enum('status', ['menunggu', 'selesai'])->default('menunggu');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('periksas');
    }
};
