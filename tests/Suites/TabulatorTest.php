<?php

namespace Suites;

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
            print new  table
            
            END;

        $this->assertSame($expectedTable, $this->getSimpleTable());
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

        $this->assertSame($expectedTable, $this->getSimpleTableWithNumbers());
    }

    /**
     * Test table with header.
     *
     * @return void
     */
    public function testHeader(): void
    {
        $expectedTable = <<<END
            put   some foo barbaz
            print new    1    1.2
            
            END;

        $this->assertSame($expectedTable, $this->getSimpleTableWithNumbersAndHeader());
    }
}
