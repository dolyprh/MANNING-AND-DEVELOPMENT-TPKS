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
        Schema::create('spk_m_katering', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('email_vendor_food')->nullable();
            $table->integer('kode_cabang')->nullable();
            $table->integer('kode_terminal')->nullable();
            $table->integer('kode_regional')->nullable();
            $table->string('phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spk_m_katering');
    }
};
