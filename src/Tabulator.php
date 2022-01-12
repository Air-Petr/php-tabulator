<?php

namespace AirPetr;

use AirPetr\Compositions\Plain;

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
        return Tabulator::getPlain($data, $headers);
    }

    /**
     * Return plain table.
     *
     * @param array $data
     * @param array|null $headers
     *
     * @return string
     */
    public static function getPlain(array $data, ?array $headers = []): string
    {
        $formatter = new Plain($data, $headers);
        return $formatter->getTable();
    }
}
