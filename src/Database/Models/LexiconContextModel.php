<?php

namespace TeaAroma\Lexicon\Database\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use TeaAroma\Lexicon\Enums\LexiconConfig;


/**
 * The database model for the each 'context' table.
 */
class LexiconContextModel extends Model
{
    /**
     * Returns a new instance by the given context.
     *
     * @param string $context
     *
     * @return static
     */
    public static function forContext(string $context): static
    {
        return (new LexiconContextModel())->setTable(LexiconConfig::DATABASE_PREFIX->getConfig() . $context);
    }

    /**
     * Language relation.
     *
     * @return BelongsTo
     */
    public function language(): BelongsTo
    {
        return $this->belongsTo(LexiconLanguagesModel::class);
    }

    /**
     * Context relation.
     *
     * @return BelongsTo
     */
    public function context(): BelongsTo
    {
        return $this->belongsTo(LexiconContextsModel::class);
    }
}
