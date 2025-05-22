<?php

namespace TeaAroma\Lexicon\Enums;


/**
 * Provides an error message used in this package.
 */
enum LexiconError: string
{
    case PACKAGE_NOT_INSTALLED = 'This package is not installed.';

    case PACKAGE_ALREADY_INSTALLED = 'This package is already installed.';

    case INVALID_OPTIONS_TYPE = 'The given option class \'%s\' is not a subclass of \'%s\'.';

    case UNDEFINED_CONTEXT = 'The \'%s\' context is not defined.';

    case UNDEFINED_LANGUAGE = 'The \'%s\' language is not defined.';

    /**
     * Formats the error message with specified arguments.
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
