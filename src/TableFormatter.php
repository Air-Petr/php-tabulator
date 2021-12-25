<?php

namespace AirPetr;

use AirPetr\Classes\ColumnTypes\NumericType;
use AirPetr\Classes\ColumnTypes\StringType;

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
     */
    public function __construct(array $data, ?array $headers)
    {
        $this->data = $data;
        $this->headers = $headers;
        $this->types = [];
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
        $this->setColumnTypes();
    }

    /**
     * Return table string.
     *
     * @return string
     */
    protected function getResultString(): string
    {
        $result = '';

        if ($this->headers) {
            $result .= $this->getHeaderRow();
        }

        $result .= implode(PHP_EOL, $this->getRows()) . PHP_EOL;

        return $result;
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

    protected function setColumnTypes(): void
    {
        if (!$this->data) {
            return;
        }

        foreach ($this->data[0] as $cell) {
            if (is_numeric($cell)) {
                $this->types[] = new NumericType();
            } else {
                $this->types[] = new StringType();
            }
        }
    }

    /**
     * Return header row.
     *
     * @return string
     */
    protected function getHeaderRow(): string
    {
        $types = [];

        foreach ($this->sizes as $size) {
            $types[] = (new StringType())->getFormat($size);
        }

        $formatString = implode(' ', $types) . PHP_EOL;

        return sprintf($formatString, ...$this->headers);
    }

    /**
     * Return row format.
     *
     * @return string
     */
    protected function getRowFormat(): string
    {
        $formatParts = [];
        foreach ($this->sizes as $key => $colSize) {
            $formatParts[] = $this->types[$key]->getFormat($colSize);
        }

        return implode(' ', $formatParts);
    }

    /**
     * Return formatted rows.
     *
     * @return array
     */
    protected function getRows(): array
    {
        $format = $this->getRowFormat();

        $rows = [];

        foreach ($this->data as $row) {
            $rows[] = sprintf($format, ...$row);
        }
        return $rows;
    }
}
