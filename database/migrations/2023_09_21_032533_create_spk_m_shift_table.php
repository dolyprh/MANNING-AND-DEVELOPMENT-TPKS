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
        Schema::create('spk_m_shift', function (Blueprint $table) {
            $table->id('id_shift');
            $table->string('nama_shift')->nullable();
            $table->string('waktu_mulai')->nullable();
            $table->string('waktu_selsai')->nullable();
            $table->timestamps();
            $table->integer('kd_regional')->nullable();
            $table->integer('kd_cabang')->nullable();
            $table->integer('kd_terminal')->nullable();
            $table->string('mulai_istirahat')->nullable();
            $table->string('selesai_istirahat')->nullable();
            $table->char('collumn3', 10)->nullable();
            $table->char('collumn4', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spk_m_shift');
    }
};
