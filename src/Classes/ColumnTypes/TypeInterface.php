<?php

namespace AirPetr\Classes\ColumnTypes;

interface TypeInterface
{
    /**
     * Return format of the type.
     *
     * @param int $size
     *
     * @return string
     */
    public function getFormat(int $size): string;
}
