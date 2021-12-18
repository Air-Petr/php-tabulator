<?php

namespace AirPetr;

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
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Return table data.
     *
     * @return string
     */
    public function getTable(): string
    {
        $sizes = $this->getColumnSizes();
        $format = $this->getRowFormat($sizes);
        $rows = $this->getRows($format);

        return implode(PHP_EOL, $rows);
    }

    /**
     * Return column sizes.
     *
     * @return array
     */
    protected function getColumnSizes(): array
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

        return $sizes;
    }

    /**
     * Return row format.
     *
     * @param array $sizes
     *
     * @return string
     */
    protected function getRowFormat(array $sizes): string
    {
        $formatParts = [];
        foreach ($sizes as $key => $colSize) {
            $formatParts[] = '%-' . $colSize . 's';
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
