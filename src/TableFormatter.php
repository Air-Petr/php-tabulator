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
     * Size of columns.
     *
     * @var array|null
     */
    protected ?array $sizes;

    /**
     * Type of columns.
     *
     * @var array|null
     */
    protected ?array $types;

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

        $this->setColumnTypes();
    }

    /**
     * Return table data.
     *
     * @return string
     */
    public function getTable(): string
    {
        $this->prepareTableStructureData();
        return $this->getResultString();
    }

    /**
     * Prepare metadata of table.
     *
     * @return void
     */
    protected function prepareTableStructureData(): void
    {
        $this->setColumnSizes();
    }

    /**
     * Return table string.
     *
     * @return string
     */
    protected function getResultString(): string
    {
        $composition = new Plain($this->data, $this->headers, $this->sizes, $this->types);
        return $composition->getTable();
    }

    /**
     * Set column sizes.
     *
     * @return void
     */
    protected function setColumnSizes(): void
    {
        $sizes = [];
        $data = $this->data;

        if ($this->headers) {
            $data = array_merge([$this->headers], $data);
        }

        foreach ($data as $row) {
            foreach ($row as $colNumber => $colData) {
                $count = strlen($colData);

                if (empty($sizes[$colNumber])) {
                    $sizes[$colNumber] = $count;
                }

                if ($count > $sizes[$colNumber]) {
                    $sizes[$colNumber] = $count;
                }
            }
        }

        $this->sizes = $sizes;
    }

    /**
     * Set column types.
     *
     * @return void
     */
    protected function setColumnTypes(): void
    {
        $factory = new TypesListFactory(array_merge([$this->headers], $this->data));
        $this->types = $factory->getTypes();
    }
}
