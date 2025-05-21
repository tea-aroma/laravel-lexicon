<?php

use TeaAroma\Lexicon\Services\LexiconService;


if (! function_exists('lexicon'))
{
    /**
     * Gets the 'LexiconService' instance.
     *
     * @return LexiconService
     */
    function lexicon(): LexiconService
    {
        return app(LexiconService::class);
    }
}
