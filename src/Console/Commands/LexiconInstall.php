<?php

namespace TeaAroma\Lexicon\Console\Commands;


use Illuminate\Console\Command;
use TeaAroma\Lexicon\Enums\LexiconMessage;
use TeaAroma\Lexicon\Installation\LexiconInstaller;
use TeaAroma\Lexicon\Standards\FileIndicators\Enums\FileIndicatorType;
use TeaAroma\Lexicon\Standards\FileIndicators\FileIndicators;


/**
 * Console command for installing the Lexicon package.
 */
class LexiconInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lexicon:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Lexicon package.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $installer = new LexiconInstaller();

        if (FileIndicators::hasIndicator(FileIndicatorType::INSTALLED))
        {
            $this->info(LexiconMessage::ALREADY_INSTALLED->format('Lexicon'));

            return self::FAILURE;
        }

        $installer->install();

        $this->info(LexiconMessage::INSTALLED->format('Lexicon'));

        return self::SUCCESS;
    }
}
