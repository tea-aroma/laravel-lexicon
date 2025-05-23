<?php

namespace TeaAroma\Lexicon\Installation;


use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use TeaAroma\Lexicon\Enums\LexiconConfig;
use TeaAroma\Lexicon\Standards\FileIndicators\Enums\FileIndicatorType;
use TeaAroma\Lexicon\Standards\FileIndicators\FileIndicators;


/**
 * Provides the logic for publishing the necessary files.
 */
class LexiconPublisher
{
    /**
     * Replaces and gets the migration pathname by the specified file.
     *
     * @param \SplFileInfo $file
     *
     * @return string
     */
    protected function getUpdatedMigrationPathname(\SplFileInfo $file): string
    {
        $patterns = [ '/^\d{4}_\d{2}_\d{2}_\d{6}_/', '/lexicon_/' ];

        $replacements = [ date('Y_m_d_His_'), LexiconConfig::DATABASE_PREFIX->getConfig() ];

        $pathname = preg_replace($patterns, $replacements, $file->getFilename());

        return database_path('migrations' . DIRECTORY_SEPARATOR . $pathname);
    }

    /**
     * Publishes configurations.
     *
     * @return void
     */
    public function configurations(): void
    {
        if (FileIndicators::hasIndicator(FileIndicatorType::CONFIGURATIONS_INSTALLED))
        {
            return;
        }

        $parameters = [ '--tag' => 'lexicon-config', '--force' => true ];

        Artisan::call('vendor:publish', $parameters);

        FileIndicators::appendIndicator(FileIndicatorType::CONFIGURATIONS_INSTALLED);
    }

    /**
     * Publishes migration files.
     *
     * @return void
     */
    public function migrations(): void
    {
        if (FileIndicators::hasIndicator(FileIndicatorType::MIGRATIONS_INSTALLED))
        {
            return;
        }

        foreach (File::files(__DIR__ . '/../Database/Migrations') as $file)
        {
            File::copy($file->getPathname(), $this->getUpdatedMigrationPathname($file));
        }

        FileIndicators::appendIndicator(FileIndicatorType::MIGRATIONS_INSTALLED);
    }

    /**
     * Publishes seeder files.
     *
     * @return void
     */
    public function seeders(): void
    {
        if (FileIndicators::hasIndicator(FileIndicatorType::SEEDERS_INSTALLED))
        {
            return;
        }

        $parameters = [ '--tag' => 'lexicon-seeders', '--force' => true ];

        Artisan::call('vendor:publish', $parameters);

        FileIndicators::appendIndicator(FileIndicatorType::SEEDERS_INSTALLED);
    }
}
