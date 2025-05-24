<?php

namespace TeaAroma\Lexicon\Standards\Repositories\Abstracts;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;


/**
 * Provides the abstract logic for managing database records.
 */
abstract class Repository
{
    /**
     * The model namespace.
     *
     * @var class-string<Model>
     */
    protected string $modelNamespace;

    /**
     * The model instance.
     *
     * @var Model
     */
    protected Model $model;

    /**
     * The constructor.
     */
    public function __construct()
    {
        $this->model = new $this->modelNamespace();
    }

    /**
     * Gets the primary key.
     *
     * @return string
     */
    protected function getKeyName(): string
    {
        return $this->model->getKeyName();
    }

    /**
     * Determines whether the table exists in a database.
     *
     * @return bool
     */
    public function tableExists(): bool
    {
        return Schema::hasTable($this->model->getTable());
    }

    /**
     * Creates a new instance and returns it.
     *
     * @return $this
     */
    public static function query(): static
    {
        return new static();
    }
}
