<?php

namespace DocGenerator\Model;

use DocGenerator\ContentModifier\AbstractContentModifier;

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
            $this->applyContentModifier($this->getContent()),
            $this->getCloseTag(),
        ];

        return implode('', $part);
    }

    /** @var AbstractContentModifier[]  */
    protected array $contentModifiers = [];

    /**
     * @param string $originalContent
     * @return String
     */
    protected function applyContentModifier(string $originalContent): String
    {
        $content = $originalContent;

        foreach ($this->contentModifiers as $modifier) {
            $content = $modifier->apply($content);
        }

        return $content;
    }

    /**
     * @param AbstractContentModifier $modifier
     * @return $this
     */
    public function addContentModifier(AbstractContentModifier $modifier): self
    {
        $this->contentModifiers[] = $modifier;

        return $this;
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
