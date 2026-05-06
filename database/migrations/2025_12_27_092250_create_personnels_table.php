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
        Schema::create('personnels', function (Blueprint $table) {
            $table->id();

            $table->string('subsatker');
            $table->integer('jumlah_personel');
            $table->integer('dikbang_sudah');
            $table->integer('dikbang_belum');
            $table->integer('sesuai_fungsi');

            $table->integer('pendidikan_smp')->default(0);
            $table->integer('pendidikan_sma')->default(0);
            $table->integer('pendidikan_d3')->default(0);
            $table->integer('pendidikan_s1')->default(0);
            $table->integer('pendidikan_s2')->default(0);

            $table->text('keterangan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnels');
    }
};
