<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('harian', function (Blueprint $table) {

            $table->string('karupam')->nullable()->change();

            $table->string('wakarupam')->nullable()->change();

        });
    }

    public function down(): void
    {
        Schema::table('harian', function (Blueprint $table) {

            $table->string('karupam')->nullable(false)->change();

            $table->string('wakarupam')->nullable(false)->change();

        });
    }
};