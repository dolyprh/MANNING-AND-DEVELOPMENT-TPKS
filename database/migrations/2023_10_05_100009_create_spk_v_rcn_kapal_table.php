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
        Schema::create('spk_v_rcn_kapal', function (Blueprint $table) {
            $table->string('ves_id');
            $table->char('ves_code')->nullable();
            $table->char('agent')->nullable();
            $table->string('pelayaran')->nullable();
            $table->char('in_voyage')->nullable();
            $table->char('out_voyage')->nullable();
            $table->dateTime('rcn_sandar')->nullable();
            $table->dateTime('real_sandar')->nullable();
            $table->char('berth_no')->nullable();
            $table->integer('kd_awal')->nullable();
            $table->integer('kd_akhir')->nullable();
            $table->dateTime('rcn_awal_kerja')->nullable();
            $table->dateTime('real_awal_kerja')->nullable();
            $table->dateTime('rcn_akhir_kerja')->nullable();
            $table->dateTime('real_akhir_kerja')->nullable();
            $table->dateTime('rcn_berangkat')->nullable();
            $table->dateTime('real_berangkat')->nullable();
            $table->dateTime('batal')->nullable();
            $table->string('ves_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spk_v_rcn_kapal');
    }
};
