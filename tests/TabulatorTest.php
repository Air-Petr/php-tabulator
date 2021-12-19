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
}
