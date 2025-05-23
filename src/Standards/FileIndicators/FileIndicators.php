<?php

namespace TeaAroma\Lexicon\Standards\FileIndicators;


use Illuminate\Support\Facades\File;
use TeaAroma\Lexicon\Standards\FileIndicators\Enums\FileIndicatorType;


/**
 * Provides the logic for file indicators.
 */
class FileIndicators
{
    /**
     * The file name.
     *
     * @var string
     */
    protected static string $fileName = 'lexicon-indicators.flag';

    /**
     * Writes specified indicators to the file.
     *
     * @param array $indicators
     *
     * @return bool
     */
    protected static function writeIndicators(array $indicators = []): bool
    {
        return File::put(self::getFilePath(), json_encode($indicators, JSON_PRETTY_PRINT));
    }

    /**
     * Handles the process of file.
     *
     * @return void
     */
    protected static function fileProcessing(): void
    {
        if (File::exists(self::getFilePath()))
        {
            return;
        }

        self::writeIndicators();
    }

    /**
     * Gets a path to file.
     *
     * @return string
     */
    protected static function getFilePath(): string
    {
        return storage_path(self::$fileName);
    }

    /**
     * Gets the current date-time.
     *
     * @return string
     */
    protected static function getDateTime(): string
    {
        return date('Y_m_d_H_i_s_u');
    }

    /**
     * Gets all indicators.
     *
     * @return array
     */
    public static function getIndicators(): array
    {
        self::fileProcessing();

        return File::json(self::getFilePath());
    }

    /**
     * Gets an indicator by the specified type.
     *
     * @param FileIndicatorType $indicator
     *
     * @return string|null
     */
    public static function getIndicator(FileIndicatorType $indicator): ?string
    {
        return self::getIndicators()[ $indicator->name ] ?? null;
    }

    /**
     * Appends an indicator by the specified type.
     *
     * @param FileIndicatorType $indicator
     *
     * @return bool
     */
    public static function appendIndicator(FileIndicatorType $indicator): bool
    {
        $indicators = self::getIndicators();

        $indicators[ $indicator->name ] = self::getDateTime();

        return self::writeIndicators($indicators);
    }

    /**
     * Deletes an indicator by the specified type.
     *
     * @param FileIndicatorType $indicator
     *
     * @return bool
     */
    public static function deleteIndicator(FileIndicatorType $indicator): bool
    {
        $indicators = self::getIndicators();

        unset($indicators[ $indicator->name ]);

        return self::writeIndicators($indicators);
    }

    /**
     * Determines whether an indicator exists by the specified type.
     *
     * @param FileIndicatorType $indicator
     *
     * @return bool
     */
    public static function hasIndicator(FileIndicatorType $indicator): bool
    {
        return self::getIndicator($indicator) !== null;
    }
}