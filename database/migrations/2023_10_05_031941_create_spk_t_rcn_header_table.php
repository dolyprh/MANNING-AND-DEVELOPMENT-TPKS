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
        Schema::create('spk_t_rcn_header', function (Blueprint $table) {
            // $table->integer('id');
            $table->string('ves_id');
            $table->string('ves_code')->nullable();
            $table->string('nama_kapal')->nullable();
            $table->string('pelayaran')->nullable();
            $table->string('in_voyage')->nullable();
            $table->string('out_voyage')->nullable();
            $table->integer('kd_awal')->nullable();
            $table->integer('kd_akhir')->nullable();
            $table->dateTime('rcn_sandar')->nullable();
            $table->dateTime('rcn_berangkat')->nullable();
            $table->dateTime('rcn_awal_kerja')->nullable();
            $table->dateTime('rcn_akhir_kerja')->nullable();
            $table->string('rcn_no')->nullable();
            $table->integer('kd_regional')->nullable();
            $table->integer('kd_cabang')->nullable();
            $table->integer('kd_terminal')->nullable();
            $table->timestamps();
            $table->integer('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spk_t_rcn_header');
    }
};
