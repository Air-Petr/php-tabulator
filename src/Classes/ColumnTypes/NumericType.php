<?php

namespace AirPetr\Classes\ColumnTypes;

class NumericType implements TypeInterface
{
    /**
     * @inheritDoc
     */
    public function getFormat(int $size): string
    {
        return '%' . $size . 's';
    }
}
