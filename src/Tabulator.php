<?php

namespace AirPetr;

/**
 * Format data as table.
 */
class Tabulator
{
    /**
     * Return formatted data.
     *
     * @param array $data
     *
     * @return string
     */
    public static function get(array $data): string
    {
        $formatter = new TableFormatter($data);
        return $formatter->getTable();
    }
}
