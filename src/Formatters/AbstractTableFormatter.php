<?php

namespace AirPetr\Formatters;

/**
 * Format data to table.
 */
abstract class AbstractTableFormatter
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
     * Return name of a composition class.
     *
     * @return mixed
     */
    abstract protected function compositionName();

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
        $compositionName = $this->compositionName();
        $composition = new $compositionName($this->data, $this->headers);
        return $composition->getTable();
    }
}
