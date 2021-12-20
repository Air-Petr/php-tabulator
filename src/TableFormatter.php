<?php

namespace AirPetr;

use AirPetr\Classes\ColumnType;

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
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
        $this->types = [];
    }

    /**
     * Return table data.
     *
     * @return string
     */
    public function getTable(): string
    {
        $this->setColumnSizes();
        $this->setColumnTypes();

        $format = $this->getRowFormat();
        $rows = $this->getRows($format);

        return implode(PHP_EOL, $rows) . PHP_EOL;
    }

    /**
     * Set column sizes.
     *
     * @return array
     */
    protected function setColumnSizes(): void
    {
        $sizes = [];

        foreach ($this->data as $row) {
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

        $rowToReference = (count($this->data) > 1)
            ? $this->data[1]
            : $this->data[0];

        foreach ($rowToReference as $cell) {
            if (is_numeric($cell)) {
                $this->types[] = ColumnType::NUMBER;
            } else {
                $this->types[] = ColumnType::STRING;
            }
        }
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
            if ($this->types[$key] === ColumnType::STRING) {
                $formatParts[] = '%-' . $colSize . 's';
            } else {
                $formatParts[] = '%' . $colSize . 's';
            }
        }

        return implode(' ', $formatParts);
    }

    /**
     * Return formatted rows.
     *
     * @param string $format
     *
     * @return array
     */
    protected function getRows(string $format): array
    {
        $rows = [];

        foreach ($this->data as $row) {
            $rows[] = sprintf($format, ...$row);
        }
        return $rows;
    }
}
