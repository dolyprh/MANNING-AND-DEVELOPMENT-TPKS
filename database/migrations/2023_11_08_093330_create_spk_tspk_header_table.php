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
        Schema::create('spk_tspk_header', function (Blueprint $table) {
            $table->id('id_h');
            $table->string('spk_no')->nullable();
            $table->string('approve_nipp')->nullable();
            $table->dateTime('tgl_spk')->nullable();
            $table->string('id_shift')->nullable();
            $table->string('nama_shift')->nullable();
            $table->string('nama_group')->nullable();
            $table->dateTime('approve_tgl')->nullable();
            $table->integer('status')->nullable();
            $table->dateTime('created_date')->nullable();
            $table->string('created_nipp')->nullable();
            $table->string('approve_nama')->nullable();
            $table->string('created_nama')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spk_tspk_header');
    }
};
