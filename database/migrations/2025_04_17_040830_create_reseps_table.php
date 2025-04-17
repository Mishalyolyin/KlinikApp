<?php

// database/migrations/xxxx_xx_xx_create_reseps_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('reseps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasien_id');
            $table->unsignedBigInteger('obat_id'); // <-- kolom ini WAJIB ADA
            $table->date('tanggal_cek');
            $table->string('dosis');
            $table->timestamps();
        
            $table->foreign('pasien_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('obat_id')->references('id')->on('obats')->onDelete('cascade');
        });        
    }

    public function down(): void {
        Schema::dropIfExists('reseps');
    }
};

