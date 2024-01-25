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
        Schema::create('staff_konselings', function (Blueprint $table) {
            $table->bigIncrements('id_staff_konseling');
            $table->string('nama',255);
            $table->string('jenis_konseling',255);
            $table->string('deskripsi_konseling',255);
            $table->date('tanggal_konseling');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_konselings');
    }
};
