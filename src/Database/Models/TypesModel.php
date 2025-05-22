<?php

namespace TeaAroma\Lexicon\Database\Models;


use Illuminate\Database\Eloquent\Model;


/**
 * The database model for the 'types' table.
 */
class TypesModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'lexicon_types';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string[]
     */
    protected $fillable =
        [
            'code',
            'description',
            'is_active',
            'is_default',
        ];
}
