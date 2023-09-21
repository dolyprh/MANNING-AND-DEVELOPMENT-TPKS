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
        Schema::create('spk_m_pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('nipp')->nullable();
            $table->string('status')->nullable();
            $table->string('email_address')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('type')->nullable();
            $table->string('phone')->nullable();
            $table->integer('kd_cabang')->nullable();
            $table->integer('kd_terminal')->nullable();
            $table->integer('kd_regional')->nullable();
            $table->string('jobdesk')->nullable();
            $table->string('group_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spk_m_pegawai');
    }
};
