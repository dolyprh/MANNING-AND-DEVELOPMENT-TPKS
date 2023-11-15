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
        Schema::create('spk_t_jadwal_group', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal')->nullable();
            $table->unsignedBigInteger('id_group')->nullable();
            $table->unsignedBigInteger('id_shift')->nullable();
            $table->timestamps();

            $table->foreign('id_group')->references('id_group')->on('spk_m_group')->onDelete('cascade');
            $table->foreign('id_shift')->references('id_shift')->on('spk_m_shift')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spk_t_jadwal_group');
    }
};
