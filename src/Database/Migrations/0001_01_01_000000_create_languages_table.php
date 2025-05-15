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
        Schema::create(LexiconConfig::DATABASE_PREFIX->getConfig() . 'languages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fallback_language_id')
                ->nullable()
                ->references('id')
                ->on(LexiconConfig::DATABASE_PREFIX->getConfig() . 'languages')->nullOnDelete();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('native_name')->nullable();
            $table->string('image')->nullable();
            $table->string('locale')->nullable();
            $table->enum('direction', [ 'ltr', 'rtl' ])->default('ltr');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_default')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(LexiconConfig::DATABASE_PREFIX->getConfig() . 'languages');
    }
};
