<?php

namespace TeaAroma\Lexicon\Enums;


/**
 * Represents a message of this package.
 */
enum LexiconMessage: string
{
    case INSTALLED = 'The \'%s\' has been successfully installed.';

    case ALREADY_INSTALLED = 'The \'%s\' is already installed.';

    /**
     * Formats the message with specified arguments
     *
     * @param string ...$arguments
     *
     * @return string
     */
    public function format(string ...$arguments): string
    {
        return sprintf($this->value, ...$arguments);
    }
}
