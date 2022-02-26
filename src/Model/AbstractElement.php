<?php

namespace App\Model;

abstract class AbstractElement
{
    /**
     * @return string
     */
    abstract protected function getOpenTag(): string;

    /**
     * @return string
     */
    abstract protected function getContent(): string;

    /**
     * @return string
     */
    abstract protected function getCloseTag(): string;

    /**
     * @internal
     * @return string
     */
    protected function render(): string
    {
        $part = [
            $this->getOpenTag(),
            $this->getContent(),
            $this->getCloseTag(),
        ];

        return implode('', $part);
    }

    /**
     * @return array
     */
    abstract protected function getStyle(): array;

    /**
     * @return string
     */
    protected function getStyleProperties(): string
    {
        $styles = $this->getStyle();

        if (count($styles) < 1) {
            return '';
        }

        return sprintf('style="%s"', implode($styles));
    }
}
