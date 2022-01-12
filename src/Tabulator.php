<?php

namespace AirPetr;

use AirPetr\Formatters\PlainFormatterAbstract;

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
        $formatter = new PlainFormatterAbstract($data, $headers);
        return $formatter->getTable();
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
        return Tabulator::get($data, $headers);
    }
}
