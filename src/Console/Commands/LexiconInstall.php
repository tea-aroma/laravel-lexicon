<?php

namespace TeaAroma\Lexicon\Console\Commands;


use Illuminate\Console\Command;
use TeaAroma\Lexicon\Standards\Installation\Classes\LexiconInstaller;


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

        if ($installer->isInstalled())
        {
            $this->info('Lexicon is already installed.');

            return self::FAILURE;
        }

        $installer->install();

        $this->info('Lexicon has been successfully installed.');

        return self::SUCCESS;
    }
}
