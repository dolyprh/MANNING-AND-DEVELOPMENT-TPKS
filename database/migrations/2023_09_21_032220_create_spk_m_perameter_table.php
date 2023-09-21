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
        Schema::create('spk_m_perameter', function (Blueprint $table) {
            $table->id('param_id');
            $table->string('param_code');
            $table->string('param_label');
            $table->string('val1')->nullable();
            $table->string('val2')->nullable();
            $table->string('val3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spk_m_perameter');
    }
};
