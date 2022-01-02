<?php

namespace Classes;

use AirPetr\Classes\ColumnTypes\NumericType;
use AirPetr\Classes\ColumnTypes\StringType;
use AirPetr\Classes\TypesListFactory;
use PHPUnit\Framework\TestCase;

class TypesListFactoryTest extends TestCase
{
    /**
     * Test getTypes method.
     *
     * @return void
     */
    public function testGetTypes()
    {
        $row = [['foo', '15']];
        $f = new TypesListFactory($row);
        $this->assertEquals($this->getExpectedTypes(), $f->getTypes());

        $row = [
            ['foo', 'bar'],
            ['bar', '15']
        ];
        $f = new TypesListFactory($row);
        $this->assertEquals($this->getExpectedTypes(), $f->getTypes());

        $f = new TypesListFactory([]);
        $this->assertEquals([], $f->getTypes());
    }

    /**
     * Return expected types.
     *
     * @return array
     */
    protected function getExpectedTypes(): array
    {
        return [
            new StringType(),
            new NumericType(),
        ];
    }
}
