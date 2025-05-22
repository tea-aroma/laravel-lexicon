<?php

namespace TeaAroma\Lexicon\Standards\Installation\Classes;


use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use TeaAroma\Lexicon\Enums\LexiconConfig;


/**
 * Provides the logic for installing the 'Lexicon' package.
 */
class LexiconInstaller
{
    /**
     * The flag file name.
     *
     * @var string
     */
    protected string $flagFile = 'lexicon-installed.flag';

    /**
     * Handles the process of configurations.
     *
     * @return void
     */
    protected function configurationsProcessing(): void
    {
        if ($this->isPublish('config'))
        {
            $parameters = [ '--tag' => 'lexicon-config', '--force' => true ];

            Artisan::call('vendor:publish', $parameters);
        }
    }

    /**
     * Handles the process of migrations.
     *
     * @return void
     */
    protected function migrationsProcessing(): void
    {
        if (!$this->isPublish('migrations'))
        {
            return;
        }

        $parameters = [ '--tag' => 'lexicon-migrations', '--force' => true ];

        Artisan::call('vendor:publish', $parameters);
    }

    /**
     * Handles the process of seeders.
     *
     * @return void
     */
    protected function seedersProcessing(): void
    {
        if (!$this->isPublish('seeders'))
        {
            return;
        }

        $parameters = [ '--tag' => 'lexicon-seeders', '--force' => true ];

        Artisan::call('vendor:publish', $parameters);
    }

    /**
     * Runs the installation.
     *
     * @return void
     */
    public function install(): void
    {
        if ($this->isInstalled())
        {
            return;
        }

        $this->configurationsProcessing();

        $this->migrationsProcessing();

        $this->seedersProcessing();
    }

    /**
     * Determines whether this package is installed.
     *
     * @return bool
     */
    public function isInstalled(): bool
    {
        return File::exists($this->getFlagFile());
    }

    /**
     * Determines whether a specified category should be published.
     *
     * @param string $category
     *
     * @return bool
     */
    public function isPublish(string $category): bool
    {
        return LexiconConfig::INSTALLATION->getConfig()[ $category ] ?? false;
    }

    /**
     * Gets the absolute path to the flag file.
     *
     * @return string
     */
    public function getFlagFile(): string
    {
        return storage_path($this->flagFile);
    }
}
