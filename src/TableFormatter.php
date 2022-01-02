<?php

namespace AirPetr;

use AirPetr\Classes\ColumnTypes\NumericType;
use AirPetr\Classes\ColumnTypes\StringType;
use AirPetr\Classes\TypesListFactory;
use AirPetr\Compositions\Plain;

/**
 * Format data to table.
 */
class TableFormatter
{
    /**
     * Data for table.
     *
     * @var array
     */
    protected array $data;

    /**
     * List of headers.
     *
     * @var array|null
     */
    protected ?array $headers;

    /**
     * @param array $data
     * @param array|null $headers
     */
    public function __construct(array $data, array $headers)
    {
        $this->data = $data;
        $this->headers = $headers;
    }

    /**
     * Return table data.
     *
     * @return string
     */
    public function getTable(): string
    {
        return $this->getResultString();
    }

    /**
     * Return table string.
     *
     * @return string
     */
    protected function getResultString(): string
    {
        $composition = new Plain($this->data, $this->headers);
        return $composition->getTable();
    }
}
