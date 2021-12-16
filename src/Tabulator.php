<?php

namespace AirPetr;

/**
 * Format data as table.
 */
class Tabulator
{
    /**
     * Echo formatted data as table.
     *
     * @return void
     */
    public static function echo(): void
    {
        echo (new self())->getFormattedData();
    }

    /**
     * Prepare formatted data as table.
     *
     * @return string
     */
    public static function prepare(): string
    {
        return (new self())->getFormattedData();
    }

    /**
     * Return formatted date.
     *
     * @return string
     */
    protected function getFormattedData(): string
    {
        return 'foo';
    }
}
