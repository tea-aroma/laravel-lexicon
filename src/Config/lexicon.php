<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Publish
    |--------------------------------------------------------------------------
    |
    | Determines which files should be published.
    |
    */

    'publish' => [
        'config' => true,
        'migrations' => true,
        'seeders' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Strict Mode
    |--------------------------------------------------------------------------
    |
    | If enabled, an exception will be thrown when a translation is missing.
    |
    */

    'strict_mode' => env('LEXICON_STRICT_MODE', true),

    /*
    |--------------------------------------------------------------------------
    | Driver
    |--------------------------------------------------------------------------
    |
    | Defines the source of translations: either 'database' or 'files'.
    |
    | Available values: 'database', 'files'.
    |
    */

    'driver' => env('LEXICON_DRIVER', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Directory
    |--------------------------------------------------------------------------
    |
    | Path to the directory containing language files, used when the 'driver' is set to 'files'.
    |
    */

    'directory' => env('LEXICON_DIRECTORY', '/lang'),

    /*
    |--------------------------------------------------------------------------
    | Database Prefix
    |--------------------------------------------------------------------------
    |
    | Prefix for database tables.
    |
    */

    'database_prefix' => env('LEXICON_DATABASE_PREFIX', 'lexicon_'),

    /*
    |--------------------------------------------------------------------------
    | Common Context
    |--------------------------------------------------------------------------
    |
    | The common context (database table) name used to store translations.
    |
    */

    'common_context' => env('LEXICON_COMMON_CONTEXT', 'translations'),

];
