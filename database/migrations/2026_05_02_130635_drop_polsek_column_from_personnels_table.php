<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('personnels', function (Blueprint $table) {
            $table->dropColumn('polsek'); // ✅ ini yang hapus kolom lama
        });
    }

    public function down(): void
    {
        Schema::table('personnels', function (Blueprint $table) {
            $table->string('polsek')->nullable();
        });
    }
};