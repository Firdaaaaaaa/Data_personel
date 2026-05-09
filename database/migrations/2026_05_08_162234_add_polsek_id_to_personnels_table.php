<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('personnels', function (Blueprint $table) {

            $table->foreignId('polsek_id')
                ->nullable()
                ->constrained('polseks')
                ->cascadeOnDelete();

        });
    }

    public function down(): void
    {
        Schema::table('personnels', function (Blueprint $table) {

            $table->dropForeign(['polsek_id']);
            $table->dropColumn('polsek_id');

        });
    }
};