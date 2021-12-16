<?php

use AirPetr\Tabulator;
use PHPUnit\Framework\TestCase;

class TabulatorTest extends TestCase
{
    /**
     * Test echo function.
     *
     * @return void
     */
    public function testEcho(): void
    {
        $this->expectOutputString('foo');
        Tabulator::echo();
    }

    /**
     * Test prepare function.
     *
     * @return void
     */
    public function testPrepare(): void
    {
        $this->assertSame('foo', Tabulator::prepare());
    }
}
