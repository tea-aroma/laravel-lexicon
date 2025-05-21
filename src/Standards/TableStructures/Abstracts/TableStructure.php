<?php

namespace TeaAroma\Lexicon\Standards\TableStructures\Abstracts;


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use TeaAroma\Lexicon\Enums\LexiconConfig;


/**
 * Provides the base logic for managing table structures.
 */
readonly abstract class TableStructure
{
    /**
     * The table name.
     *
     * @var string
     */
    public string $tableName;

    /**
     * @param string $tableName
     */
    public function __construct(string $tableName)
    {
        $this->tableName = LexiconConfig::DATABASE_PREFIX->getConfig() . $tableName;
    }

    /**
     * Creates the table using the structure defined in 'applyProcessing' method.
     *
     * @return void
     */
    public function create(): void
    {
        Schema::create($this->tableName, $this->applyProcessing( ... ));
    }

    /**
     * Drops the table if it exits.
     *
     * @return void
     */
    public function dropIfExist(): void
    {
        Schema::dropIfExists($this->tableName);
    }

    /**
     * Applies the structure to the table schema.
     *
     * @param Blueprint $table
     *
     * @return void
     */
    abstract public function applyProcessing(Blueprint $table): void;
}
