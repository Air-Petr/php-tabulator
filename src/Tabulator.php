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
     * @param array|null $headers
     *
     * @return string
     */
    public static function get(array $data, ?array $headers = []): string
    {
        $formatter = new TableFormatter($data, $headers);
        return $formatter->getTable();
    }
}
