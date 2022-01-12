<?php

namespace AirPetr\Compositions;

/**
 * GitHub table composition.
 */
class GitHub extends AbstractComposition
{
    /**
     * @inheritDoc
     */
    protected function printHeaderBottomBorder(): void
    {
        echo "| ";

        $strings = [];
        foreach ($this->sizes as $size) {
            $strings[] = str_repeat('-', $size);
        }

        echo implode(' | ', $strings);

        echo " |" . PHP_EOL;
    }

    /**
     * @inheritDoc
     */
    protected function getHeaderJoint(): string
    {
        return ' | ';
    }

    /**
     * @inheritDoc
     */
    protected function getBodyColumnJoint(): string
    {
        return ' | ';
    }

    /**
     * @inheritDoc
     */
    protected function printLeftHeaderBorder(): void
    {
        echo $this->getGitHubLeftBorder();
    }

    /**
     * @inheritDoc
     */
    protected function printRightHeaderBorder(): void
    {
        echo $this->getGitHubRightBorder();
    }

    /**
     * @inheritDoc
     */
    protected function printLeftBodyBorder(): void
    {
        echo $this->getGitHubLeftBorder();
    }

    /**
     * @inheritDoc
     */
    protected function printRightBodyBorder(): void
    {
        echo $this->getGitHubRightBorder();
    }

    /**
     * Return left border.
     *
     * @return string
     */
    protected function getGitHubLeftBorder(): string
    {
        return '| ';
    }

    /**
     * Return right border.
     *
     * @return string
     */
    protected function getGitHubRightBorder(): string
    {
        return ' |';
    }
}
