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
        Schema::create('spk_shift_tmp', function (Blueprint $table) {
            $table->integer('detail_id')->nullable();
            $table->string('rcn_no');
            $table->integer('id_shift');
            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_selesai');
            $table->string('nama_shift');
            $table->string('ves_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spk_shift_tmp');
    }
};
