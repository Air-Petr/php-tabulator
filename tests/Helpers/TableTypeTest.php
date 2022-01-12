<?php

namespace Helpers;

use AirPetr\Tabulator;
use PHPUnit\Framework\TestCase;

class TableTypeTest extends TestCase
{
    /**
     * Return table data for tests.
     *
     * @return \string[][]
     */
    protected function getTableData(): array
    {
        return [
            ['put', 'some', 'data'],
            ['print', 'new', 'row'],
        ];
    }

    /**
     * Return table data with numbers for tests.
     *
     * @return \string[][]
     */
    protected function getTableDataWithNumbers(): array
    {
        return [
            ['put', 'some', 10, 1.23],
            ['print', 'new', 1, 1.2],
        ];
    }

    /**
     * Return header data for tests with numbers.
     *
     * @return \string[][]
     */
    protected function getHeaderDataForNumbers(): array
    {
        return ['print', 'header', 'for', 'numbers'];
    }
}
