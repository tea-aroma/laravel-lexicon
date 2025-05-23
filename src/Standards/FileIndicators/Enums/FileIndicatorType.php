<?php

namespace TeaAroma\Lexicon\Standards\FileIndicators\Enums;


/**
 * Represents an indicator type for FileIndicators.
 */
enum FileIndicatorType
{
    case INSTALLED;

    case CONFIGURATIONS_INSTALLED;

    case MIGRATIONS_INSTALLED;

    case SEEDERS_INSTALLED;
}
