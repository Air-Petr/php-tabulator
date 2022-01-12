<?php

namespace Suites\Compositions;

use AirPetr\Tabulator;
use Helpers\TableTypeTest;

/**
 * Test for GitHub table type.
 */
class GitHubTest extends TableTypeTest
{
    /**
     * Test simple data.
     *
     * @return void
     */
    public function testSimpleDataWithoutHeader(): void
    {
        $expectedTable = <<<END
            | put   | some | data |
            | print | new  | row  |
            
            END;

        $this->assertSame($expectedTable, Tabulator::getGitHub($this->getTableData()));
    }

    /**
     * Test numeric types.
     *
     * @return void
     */
    public function testNumericTypes(): void
    {
        $expectedTable = <<<END
            | put   | some | 10 | 1.23 |
            | print | new  |  1 |  1.2 |
            
            END;

        $this->assertSame($expectedTable, Tabulator::getGitHub($this->getTableDataWithNumbers()));
    }

    /**
     * Test table with header.
     *
     * @return void
     */
    public function testHeader(): void
    {
        $expectedTable = <<<END
            | print | header | for | numbers |
            | ----- | ------ | --- | ------- |
            | put   | some   |  10 |    1.23 |
            | print | new    |   1 |     1.2 |
            
            END;

        $this->assertSame($expectedTable, Tabulator::getGitHub(
            $this->getTableDataWithNumbers(),
            $this->getHeaderDataForNumbers()
        ));
    }
}
