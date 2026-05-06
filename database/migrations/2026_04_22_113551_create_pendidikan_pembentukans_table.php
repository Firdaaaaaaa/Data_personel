<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendidikan_pembentukans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pendidikan'); // contoh: Diktukba
            $table->string('jenis_diktuk');    // contoh: Bintara
            $table->string('keterangan')->nullable(); // opsional
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendidikan_pembentukans');
    }
};