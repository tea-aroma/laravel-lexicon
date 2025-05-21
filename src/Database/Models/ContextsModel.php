<?php

namespace TeaAroma\Lexicon\Database\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 * The database model for the 'contexts' table.
 */
class ContextsModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'lexicon_contexts';

    /**
     * Language relation.
     *
     * @return BelongsTo
     */
    public function language(): BelongsTo
    {
        return $this->belongsTo(LanguagesModel::class);
    }
}
