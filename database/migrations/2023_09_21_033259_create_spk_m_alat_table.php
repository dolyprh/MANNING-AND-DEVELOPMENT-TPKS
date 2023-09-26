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
        Schema::create('spk_m_alat', function (Blueprint $table) {
            $table->id();
            $table->string('kode_alat');
            $table->string('nama_alat');
            $table->string('jenis_alat');
            $table->string('keterangan');
            $table->integer('kd_regional')->nullable();
            $table->integer('kd_cabang')->nullable();
            $table->integer('kd_terminal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spk_m_alat');
    }
};
