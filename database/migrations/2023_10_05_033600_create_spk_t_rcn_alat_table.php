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
        Schema::create('spk_t_rcn_alat', function (Blueprint $table) {
            $table->integer('seq_id')->nullable();
            $table->integer('detail_id')->nullable();
            $table->string('kd_alat')->nullable();
            $table->string('nama_alat')->nullable();
            $table->dateTime('waktu_mulai')->nullable();
            $table->dateTime('waktu_selesai')->nullable();
            $table->string('rcn_no')->nullable();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spk_t_rcn_alat');
    }
};
