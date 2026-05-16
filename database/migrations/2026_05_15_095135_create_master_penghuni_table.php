<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('master_penghuni', function (Blueprint $table) {

            $table->id();

            // Kapasitas
            $table->integer('kapasitas')->default(0);

            // Gender
            $table->integer('pria')->default(0);

            $table->integer('wanita')->default(0);

            // Total otomatis
            $table->integer('isi')->default(0);

            // Status penghuni
            $table->integer('tahanan')->default(0);

            $table->integer('narapidana')->default(0);

            // Khusus
            $table->integer('wna')->default(0);

            $table->integer('lansia')->default(0);

            $table->integer('andikpas')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('master_penghuni');
    }
};