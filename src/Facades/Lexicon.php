<?php

namespace TeaAroma\Lexicon\Facades;


use Illuminate\Support\Facades\Facade;
use TeaAroma\Lexicon\Services\LexiconService;


/**
 * @see LexiconService
 */
class Lexicon extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'lexicon';
    }
}