<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('titik_sampahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tps');
            $table->string('kecamatan');
            $table->text('deskripsi');
            $table->integer('kapasitas_kg');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('titik_sampahs');
    }
};