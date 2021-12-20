<?php

namespace AirPetr\Classes\ColumnTypes;

class StringType implements TypeInterface
{
    /**
     * @inheritDoc
     */
    public function getFormat(int $size): string
    {
        return  '%-' . $size . 's';
    }
}
