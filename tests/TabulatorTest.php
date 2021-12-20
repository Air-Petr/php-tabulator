<?php

use AirPetr\Tabulator;
use PHPUnit\Framework\TestCase;

class TabulatorTest extends TestCase
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

        $this->assertSame($expectedTable, Tabulator::get([
            ['put', 'some', 'data'],
            ['print', 'new', 'table'],
        ]));
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

        $this->assertSame($expectedTable, Tabulator::get([
            ['put', 'some', 10, 1.23],
            ['print', 'new', 1, 1.2],
        ]));
    }
}
