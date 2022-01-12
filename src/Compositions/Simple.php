<?php

namespace AirPetr\Compositions;

/**
 * Simple table composition.
 */
class Simple extends AbstractComposition
{
    /**
     * Print header bottom border.
     *
     * @return void
     */
    protected function printHeaderBottomBorder(): void
    {
        $strings = [];
        foreach ($this->sizes as $size) {
            $strings[] = str_repeat('-', $size);
        }

        echo implode(' ', $strings) . "\n";
    }
}
