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

            $table->string('nama');
            $table->string('nrp')->unique();

            $table->foreignId('pangkat_id')
                ->constrained('pangkats')
                ->cascadeOnDelete();

            $table->foreignId('jabatan_id')
                ->constrained('jabatans')
                ->cascadeOnDelete();

            $table->foreignId('dikum_id')
                ->nullable()
                ->constrained('pendidikan_umums')
                ->nullOnDelete();

            $table->foreignId('diktuk_id')
                ->nullable()
                ->constrained('pendidikan_pembentukans')
                ->nullOnDelete();

            $table->foreignId('dikjur_id')
                ->nullable()
                ->constrained('pengembangans')
                ->nullOnDelete();

            $table->string('polsek');

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