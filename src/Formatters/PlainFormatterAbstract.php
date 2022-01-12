<?php

namespace AirPetr\Formatters;

use AirPetr\Compositions\Plain;

/**
 * Plain formatter.
 */
class PlainFormatterAbstract extends AbstractTableFormatter
{
    /**
     * @inheritDoc
     */
    protected function compositionName()
    {
        return Plain::class;
    }
}
