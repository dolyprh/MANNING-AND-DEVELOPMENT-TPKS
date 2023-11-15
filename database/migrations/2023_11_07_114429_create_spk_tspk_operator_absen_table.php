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
        Schema::create('spk_tspk_operator_absen', function (Blueprint $table) {
            $table->integer('id_h')->nullable();
            $table->integer('seq_id')->nullable();
            $table->string('nipp')->nullable();
            $table->string('nama')->nullable();
            $table->string('jobdesk')->nullable();
            $table->string('status')->nullable();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spk_tspk_operator_absen');
    }
};
