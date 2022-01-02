<?php

namespace AirPetr\Compositions;

use AirPetr\Classes\ColumnTypes\StringType;

/**
 * Plain table composition.
 */
class Plain
{
    /**
     * Body data.
     *
     * @var array
     */
    protected array $data;

    /**
     * Column headers.
     *
     * @var array
     */
    protected array $headers;

    /**
     * Column sizes.
     *
     * @var array
     */
    protected array $sizes;

    /**
     * Column types.
     *
     * @var array
     */
    protected array $types;

    /**
     * Constructor.
     *
     * @param array $data
     * @param array $headers
     */
    public function __construct(array $data, array $headers, array $sizes, array $types)
    {
        $this->data = $data;
        $this->headers = $headers;
        $this->sizes = $sizes;
        $this->types = $types;
    }

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

        $table = ob_get_contents();
        ob_end_clean();
        return $table;
    }

    /**
     * Print table header.
     *
     * @return void
     */
    protected function printHeader(): void
    {
        if (!$this->headers) {
            return;
        }

        $headers = [];
        foreach ($this->headers as $key => $header) {
            $headers[] = (new StringType())->getFormat($this->sizes[$key]);
        }

        $headerFormat = implode(' ',$headers) . PHP_EOL;
        printf($headerFormat, ...$this->headers);
    }

    /**
     * Print table body.
     *
     * @return void
     */
    protected function printBody(): void
    {
        if (!$this->data) {
            return;
        }

        foreach ($this->data as $row) {
            $columns = [];
            foreach ($row as $key => $cell) {
                $columns[] = $this->types[$key]->getFormat($this->sizes[$key]);

            }

            $rowFormat = implode(' ',$columns) . PHP_EOL;
            printf($rowFormat, ...$row);
        }
    }
}