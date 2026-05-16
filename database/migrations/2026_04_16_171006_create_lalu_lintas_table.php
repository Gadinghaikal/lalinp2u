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
        Schema::create('lalu_lintas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('harian_id')->constrained('harian')->onDelete('cascade');
            $table->string('uraian');
            $table->integer('jumlah');
            $table->time('jam_keluar');
            $table->time('jam_masuk')->nullable();
            $table->enum('status', ['Keluar', 'Kembali']);
            $table->string('petugas')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lalu_lintas');
    }
};
