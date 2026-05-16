<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('harian', function (Blueprint $table) {

            // Nullable agar tidak wajib diisi
            $table->string('karupam')->nullable()->change();

            $table->string('wakarupam')->nullable()->change();

            // Tambahan baru
            $table->string('rupam')->nullable()->after('wakarupam');

            $table->string('petugas_1')->nullable()->after('rupam');

            $table->string('petugas_2')->nullable()->after('petugas_1');

        });
    }

    public function down(): void
    {
        Schema::table('harian', function (Blueprint $table) {

            $table->string('karupam')->nullable(false)->change();

            $table->string('wakarupam')->nullable(false)->change();

            $table->dropColumn([
                'rupam',
                'petugas_1',
                'petugas_2'
            ]);

        });
    }
};