<?php

namespace Suites;

use AirPetr\Tabulator;
use Helpers\TableTypeTest;

class TabulatorTest extends TableTypeTest
{
    /**
     * Test get function.
     *
     * @return void
     */
    public function testGetter(): void
    {
        $expectedTable = <<<END
            put   some data
            print new  row 
            
            END;

        $this->assertSame($expectedTable, Tabulator::get($this->getTableData()));
    }

    /**
     * Test numeric types.
     *
     * @return void
     */
    public function testNumericTypes(): void
    {
        $expectedTable = <<<END
            put   some 10 1.23
            print new   1  1.2
            
            END;

        $this->assertSame($expectedTable, Tabulator::get($this->getTableDataWithNumbers()));
    }

    /**
     * Test table with header.
     *
     * @return void
     */
    public function testHeader(): void
    {
        $expectedTable = <<<END
            print header for numbers
            put   some    10    1.23
            print new      1     1.2
            
            END;

        $this->assertSame($expectedTable, Tabulator::get(
            $this->getTableDataWithNumbers(),
            $this->getHeaderDataForNumbers()
        ));
    }
}
