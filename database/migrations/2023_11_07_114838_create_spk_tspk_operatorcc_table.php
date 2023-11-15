<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('spk_tspk_operatorcc', function (Blueprint $table) {
            $table->integer('id_h')->nullable();
            $table->integer('seq_id')->nullable();
            $table->string('nipp')->nullable();
            $table->string('nama')->nullable();
            $table->string('kode_alat')->nullable();
            $table->string('nama_alat')->nullable();
            $table->dateTime('waktu_mulai')->nullable();
            $table->dateTime('waktu_selesai')->nullable();
            $table->string('nama_kapal')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spk_tspk_operatorcc');
    }
};
