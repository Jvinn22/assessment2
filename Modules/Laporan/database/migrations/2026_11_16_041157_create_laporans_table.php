<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('titik_sampah_id');
            $table->integer('volume_sampah');
            $table->string('status_kondisi');
            $table->text('deskripsi');
            $table->string('foto_bukti');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('titik_sampahs');
    }
};