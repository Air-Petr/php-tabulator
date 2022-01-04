<?php

namespace AirPetr\Compositions;

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
}
