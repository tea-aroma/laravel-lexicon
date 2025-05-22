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
     * @var string[]
     */
    protected $fillable =
        [
            'code',
            'table_name',
            'description',
            'is_active',
            'is_default',
        ];

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
