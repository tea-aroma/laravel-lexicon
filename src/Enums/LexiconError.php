<?php

namespace TeaAroma\Lexicon\Enums;


/**
 * The enum contains all possible messages of errors.
 */
enum LexiconError: string
{
    case INVALID_OPTIONS_TYPE = 'The given option class \'%s\' is not a subclass of \'%s\'.';

    case UNDEFINED_CONTEXT = 'The \'%s\' context is not defined.';

    case UNDEFINED_LANGUAGE = 'The \'%s\' language is not defined.';

    /**
     * Formats the message of error.
     *
     * @param string ...$args
     *
     * @return string
     */
    public function format(string ...$args): string
    {
        return sprintf($this->value, ...$args);
    }
}
