<?php

namespace TeaAroma\Lexicon\Installation;


use TeaAroma\Lexicon\Standards\FileIndicators\Enums\FileIndicatorType;
use TeaAroma\Lexicon\Standards\FileIndicators\FileIndicators;


/**
 * Provides the logic for installing the Lexicon package.
 */
class LexiconInstaller
{
    /**
     * The Publisher instance.
     *
     * @var LexiconPublisher
     */
    protected LexiconPublisher $publisher;

    /**
     *
     */
    public function __construct()
    {
        $this->publisher = new LexiconPublisher();
    }

    /**
     * Runs the installation.
     *
     * @return void
     */
    public function install(): void
    {
        if (FileIndicators::hasIndicator(FileIndicatorType::INSTALLED))
        {
            return;
        }

        $this->publisher->configurations();

        $this->publisher->migrations();

        $this->publisher->seeders();

        FileIndicators::appendIndicator(FileIndicatorType::INSTALLED);
    }

    /**
     * Runs the installation of configurations.
     *
     * @return void
     */
    public function installConfigurations(): void
    {
        $this->publisher->configurations();
    }
}
