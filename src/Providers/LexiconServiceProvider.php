<?php

namespace TeaAroma\Lexicon\Providers;


use Illuminate\Support\ServiceProvider;


/**
 * Service provider for the 'Lexicon' package.
 *
 * @package TeaAroma\LexiconServiceProvider
 */
class LexiconServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([ __DIR__ . '/../Config/lexicon.php' => config_path('lexicon.php') ], 'config');
    }

    /**
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../Config/lexicon.php', 'lexicon');
    }
}
