<?php

namespace TeaAroma\Lexicon\Providers;


use Illuminate\Support\ServiceProvider;
use TeaAroma\Lexicon\Console\Commands\LexiconInstall;


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
        if ($this->app->runningInConsole())
        {
            $this->publishes([ __DIR__ . '/../Config/lexicon.php' => config_path('lexicon.php') ], 'lexicon-config');

            $this->publishes([ __DIR__.'/../Database/Seeders/' => database_path('seeders') ], 'lexicon-seeders');

            $this->publishes([ __DIR__.'/../Database/Migrations/' => database_path('migrations') ], 'lexicon-migrations');

            $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        }
    }

    /**
     * @return void
     */
    public function register(): void
    {
        if ($this->app->runningInConsole())
        {
            $this->commands([ LexiconInstall::class ]);

            $this->mergeConfigFrom(__DIR__ . '/../Config/lexicon.php', 'lexicon');
        }
    }
}
