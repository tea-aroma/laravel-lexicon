<?php

namespace TeaAroma\Lexicon\Enums;


/**
 * Provides a configuration key used in this package.
 */
enum LexiconConfig: string
{
    case INSTALLATION = 'installation';

    case STRICT_MODE = 'strict_mode';

    case DRIVER = 'driver';

    case DIRECTORY = 'directory';

    case DATABASE_PREFIX = 'database_prefix';

    case COMMON_CONTEXT = 'common_context';

    /**
     * Gets the value from configurations.
     *
     * @param string|null $default
     *
     * @return string
     */
    public function getConfig(?string $default = null): mixed
    {
        return config('lexicon.' . $this->value, $default);
    }

    /**
     * Gets the value from configuration with the specified suffix appended.
     *
     * @param string      $suffix
     * @param string|null $default
     *
     * @return string
     */
    public function withSuffix(string $suffix, ?string $default = null): string
    {
        return $this->getConfig($default) . $suffix;
    }
}
