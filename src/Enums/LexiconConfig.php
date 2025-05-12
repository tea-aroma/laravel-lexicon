<?php

namespace TeaAroma\Lexicon\Enums;


/**
 * The enum contains all possible configurations of this package.
 */
enum LexiconConfig: string
{
    case STRICT_MODE = 'strict_mode';

    case DRIVER = 'driver';

    case DIRECTORY = 'directory';

    case DATABASE_PREFIX = 'database_prefix';

    case COMMON_CONTEXT = 'common_context';

    /**
     * Gets the value from configurations.
     *
     * @return string
     */
    public function getConfig(): string
    {
        return config('lexicon.' . $this->value);
    }
}
