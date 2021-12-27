<?php

namespace AirPetr\Compositions;

/**
 * Plain table composition.
 */
class Plain
{
    /**
     * Return table.
     *
     * @return string
     */
    public function getTable(): string
    {
        ob_start();

        $this->printHeader();
        $this->printBody();

        return ob_get_flush();
    }

    /**
     * Print table header.
     *
     * @return void
     */
    protected function printHeader(): void
    {
        echo 'header' . PHP_EOL;
    }

    /**
     * Print table body.
     *
     * @return void
     */
    protected function printBody(): void
    {
        echo 'body' . PHP_EOL;
    }
}
