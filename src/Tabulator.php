<?php

namespace AirPetr;

use AirPetr\Compositions\GitHub;
use AirPetr\Compositions\Plain;
use AirPetr\Compositions\Simple;

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

    /**
     * Return simple table.
     *
     * @param array $data
     * @param array|null $headers
     *
     * @return string
     */
    public static function getSimple(array $data, ?array $headers = []): string
    {
        $formatter = new Simple($data, $headers);
        return $formatter->getTable();
    }

    /**
     * Return GitHub table.
     *
     * @param array $data
     * @param array|null $headers
     *
     * @return string
     */
    public static function getGitHub(array $data, ?array $headers = []): string
    {
        $formatter = new GitHub($data, $headers);
        return $formatter->getTable();
    }
}
