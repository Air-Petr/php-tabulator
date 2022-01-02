<?php

namespace AirPetr\Classes;

use AirPetr\Classes\ColumnTypes\NumericType;
use AirPetr\Classes\ColumnTypes\StringType;

/**
 * Generate list of column types.
 */
class TypesListFactory
{
    protected array $rows;

    /**
     * @param array $rows
     */
    public function __construct(array $rows)
    {
        $this->rows = $rows;
    }

    /**
     * Return column types.
     *
     * @return array
     */
    public function getTypes(): array
    {
        $types = [];

        foreach ($this->getRowForParsing() as $cell) {
            if (is_numeric($cell)) {
                $types[] = new NumericType();
            } else {
                $types[] = new StringType();
            }
        }

        return $types;
    }

    /**
     * Return row for parsing.
     *
     * @return array
     */
    protected function getRowForParsing(): array
    {
        switch (count($this->rows)) {
            case 0:
                return [];
            case 1:
                return $this->rows[0];
            default:
                return $this->rows[1];
        }
    }
}
