<?php

namespace TeaAroma\Lexicon\Database\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 * The database model for the 'languages' table.
 */
class LanguagesModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'lexicon_languages';

    /**
     * Language relation.
     *
     * @return BelongsTo
     */
    public function fallback_language(): BelongsTo
    {
        return $this->belongsTo(LanguagesModel::class);
    }
}
