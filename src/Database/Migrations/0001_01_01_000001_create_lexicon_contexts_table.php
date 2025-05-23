<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use TeaAroma\Lexicon\Enums\LexiconConfig;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(LexiconConfig::DATABASE_PREFIX->withSuffix('contexts'), function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('table_name');
            $table->string('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_default')->default(false);
            $table->timestamps();

            $table->unique(['code', 'table_name']);
        });

        // Context tables creating...
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Context tables dropping...

        Schema::dropIfExists(LexiconConfig::DATABASE_PREFIX->withSuffix('contexts'));
    }
};
