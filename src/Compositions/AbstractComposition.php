<?php

namespace AirPetr\Compositions;

use AirPetr\Classes\ColumnTypes\StringType;
use AirPetr\Classes\ThemeConfig;
use AirPetr\Classes\TypesListFactory;

/**
 * Abstract composition.
 *
 * Composition is responsible for composing various parts of a table in a single string.
 */
abstract class AbstractComposition
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
     * Size of columns.
     *
     * @var array
     */
    protected array $sizes;

    /**
     * Type of columns.
     *
     * @var array
     */
    protected array $types = [];

    /**
     * Table theme (format) config.
     *
     * @var ThemeConfig
     */
    protected ThemeConfig $theme;

    /**
     * Constructor.
     *
     * @param array $data
     * @param array $headers
     */
    public function __construct(array $data, array $headers)
    {
        $this->data = $data;
        $this->headers = $headers;
        $this->theme = new ThemeConfig();

        $this->setColumnSizes();
        $this->setColumnTypes();
    }

    /**
     * Return table.
     *
     * @return string
     */
    public function getTable(): string
    {
        ob_start();

        $this->printTopBorder();
        $this->printHeader();
        $this->printBody();
        $this->printBottomBorder();

        $table = ob_get_contents();
        ob_end_clean();
        return $table;
    }

    /**
     * Print table top border.
     *
     * @return void
     */
    protected function printTopBorder(): void
    {
        $this->printEmptyString();
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

        $this->printLeftHeaderBorder();

        $headers = [];
        foreach ($this->headers as $key => $header) {
            $headers[] = (new StringType())->getFormat($this->sizes[$key]);
        }

        $headerFormat = implode($this->getHeaderJoint(), $headers);
        printf($headerFormat, ...$this->headers);

        $this->printRightHeaderBorder();
        echo PHP_EOL;

        $this->printHeaderBottomBorder();
    }

    /**
     * Return joint of the header columns.
     *
     * @return string
     */
    protected function getHeaderJoint(): string
    {
        return $this->getBodyColumnJoint();
    }

    /**
     * Print header bottom border.
     *
     * @return void
     */
    protected function printHeaderBottomBorder(): void
    {
        $this->printEmptyString();
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

        foreach ($this->data as $key => $row) {
            $this->printLeftBodyBorder();

            $columns = [];
            foreach ($row as $key => $cell) {
                $columns[] = $this->types[$key]->getFormat($this->sizes[$key]);
            }

            $rowFormat = implode($this->getBodyColumnJoint(), $columns);
            printf($rowFormat, ...$row);

            $this->printRightBodyBorder();
            echo PHP_EOL;

            if (!$this->isLastDataLine($key)) {
                $this->printBodyRowJoint();
            }
        }
    }

    /**
     * Return joint of the body columns.
     *
     * @return string
     */
    protected function getBodyColumnJoint(): string
    {
        return ' ';
    }

    /**
     * Whether given key is the key of a last data row.
     *
     * @param int $dataKey
     *
     * @return bool
     */
    protected function isLastDataLine(int $dataKey): bool
    {
        return count($this->data) === ($dataKey + 1);
    }

    /**
     * Print joint of the body rows.
     *
     * @return void
     */
    protected function printBodyRowJoint(): void
    {
        $this->printEmptyString();
    }

    /**
     * Print table bottom border.
     *
     * @return void
     */
    protected function printBottomBorder(): void
    {
        $this->printEmptyString();
    }

    /**
     * Set column sizes.
     *
     * @return void
     */
    protected function setColumnSizes(): void
    {
        $sizes = [];
        $data = $this->data;

        if ($this->headers) {
            $data = array_merge([$this->headers], $data);
        }

        foreach ($data as $row) {
            foreach ($row as $colNumber => $colData) {
                $count = strlen($colData);

                if (empty($sizes[$colNumber])) {
                    $sizes[$colNumber] = $count;
                }

                if ($count > $sizes[$colNumber]) {
                    $sizes[$colNumber] = $count;
                }
            }
        }

        $this->sizes = $sizes;
    }

    /**
     * Set column types.
     *
     * @return void
     */
    protected function setColumnTypes(): void
    {
        $factory = new TypesListFactory(array_merge([$this->headers], $this->data), $this->theme->hasTypes);
        $this->types = $factory->getTypes();
    }

    /**
     * Print empty string.
     *
     * @return void
     */
    protected function printEmptyString(): void
    {
        echo '';
    }

    /**
     * Print left border of the header.
     *
     * @return void
     */
    protected function printLeftHeaderBorder(): void
    {
        $this->printEmptyString();
    }

    /**
     * Print right border of the header.
     *
     * @return void
     */
    protected function printRightHeaderBorder(): void
    {
        $this->printEmptyString();
    }

    /**
     * Print left border of a body row.
     *
     * @return void
     */
    protected function printLeftBodyBorder(): void
    {
        $this->printEmptyString();
    }

    /**
     * Print right border of a body row.
     *
     * @return void
     */
    protected function printRightBodyBorder(): void
    {
        $this->printEmptyString();
    }
}
