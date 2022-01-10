<?php

namespace Helpers;

use AirPetr\Tabulator;
use PHPUnit\Framework\TestCase;

class TableTypeTest extends TestCase
{
    /**
     * Return simple table.
     *
     * @return string
     */
    protected function getSimpleTable(): string
    {
        return Tabulator::get([
            ['put', 'some', 'data'],
            ['print', 'new', 'table'],
        ]);
    }

    /**
     * Return simple table with header.
     *
     * @return string
     */
    protected function getSimpleTableWithHeader(): string
    {
        return Tabulator::get(
            [['put', 'some', 'data']],
            ['print', 'new', 'table'],
        );
    }

    /**
     * Return simple table with numbers.
     *
     * @return string
     */
    protected function getSimpleTableWithNumbers(): string
    {
        return Tabulator::get([
            ['put', 'some', 10, 1.23],
            ['print', 'new', 1, 1.2],
        ]);
    }

    /**
     * Return simple table with numbers and header.
     *
     * @return string
     */
    protected function getSimpleTableWithNumbersAndHeader(): string
    {
        return Tabulator::get(
            [['print', 'new', 1, 1.2]],
            ['put', 'some', 'foo', 'barbaz']
        );
    }
}
