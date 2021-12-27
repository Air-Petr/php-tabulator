<?php

use AirPetr\Compositions\Plain;
use PHPUnit\Framework\TestCase;

class PlainCompositionTest extends TestCase
{
    /**
     * Test get function.
     *
     * @return void
     */
    public function testComposition(): void
    {
        $c = new Plain();
        $this->assertSame("header\nbody\n", $c->getTable());
    }
}
