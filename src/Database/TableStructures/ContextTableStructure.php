<?php

namespace TeaAroma\Lexicon\Database\TableStructures;


use Illuminate\Database\Schema\Blueprint;
use TeaAroma\Lexicon\Enums\LexiconConfig;
use TeaAroma\Lexicon\Standards\TableStructures\Abstracts\TableStructure;


/**
 * Provides table structure for each context table.
 */
readonly class ContextTableStructure extends TableStructure
{
    /**
     * @inheritDoc
     *
     * @param Blueprint $table
     *
     * @return void
     */
    public function applyProcessing(Blueprint $table): void
    {
        $table->id();
        $table->foreignId('language_id')->constrained(LexiconConfig::DATABASE_PREFIX->withSuffix('languages'))->nullOnDelete();
        $table->foreignId('context_id')->constrained(LexiconConfig::DATABASE_PREFIX->withSuffix('contexts'))->nullOnDelete();
        $table->foreignId('type_id')->constrained(LexiconConfig::DATABASE_PREFIX->withSuffix('types'))->nullOnDelete();
        $table->foreignId('record_id');
        $table->string('code');
        $table->string('table_name');
        $table->string('attribute')->default('unknown');
        $table->string('description')->nullable();
        $table->longText('value');
        $table->timestamps();

        $table->unique([ 'language_id', 'context_id', 'type_id', 'record_id', 'code', 'table_name', 'attribute' ]);
    }
}
