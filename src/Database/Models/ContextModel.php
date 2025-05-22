<?php

namespace TeaAroma\Lexicon\Database\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use TeaAroma\Lexicon\Enums\LexiconConfig;


/**
 * The database model for the each 'context' table.
 */
class ContextModel extends Model
{
    /**
     * @var string[]
     */
    protected $fillable =
        [
            'language_id',
            'context_id',
            'type_id',
            'record_id',
            'code',
            'table_name',
            'attribute',
            'description',
            'value',
        ];

    /**
     * Returns a new instance by the given context.
     *
     * @param string $context
     *
     * @return static
     */
    public static function forContext(string $context): static
    {
        return (new ContextModel())->setTable(LexiconConfig::DATABASE_PREFIX->withSuffix($context));
    }

    /**
     * Language relation.
     *
     * @return BelongsTo
     */
    public function language(): BelongsTo
    {
        return $this->belongsTo(LanguagesModel::class);
    }

    /**
     * Context relation.
     *
     * @return BelongsTo
     */
    public function context(): BelongsTo
    {
        return $this->belongsTo(ContextsModel::class);
    }

    /**
     * Type relation.
     *
     * @return BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(TypesModel::class);
    }
}
