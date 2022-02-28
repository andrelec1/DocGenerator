<?php

namespace DocGenerator\Model\List;

use DocGenerator\Model\AbstractElement;
use DocGenerator\Properties\StyleProperties\HasAlign;
use DocGenerator\Properties\StyleProperties\HasPadding;
use DocGenerator\Properties\StyleProperties\HasTextColor;
use DocGenerator\Properties\StyleProperties\HasTextDecoration;

class SimpleListElement extends AbstractElement
{
    use HasTextColor, HasTextDecoration, HasPadding;

    /**
     * @return array
     */
    protected function getStyle(): array
    {
        return  [
            $this->getTextColorStyle(),
            $this->getDecorationStyle(),
            $this->getPaddingStyle(40),
        ];
    }

    /** @var string[] */
    protected array $contents = [];

    /**
     * @param string $content
     * @return $this
     */
    public function addStringElement(string $content): self
    {
        $this->contents[] = $content;

        return $this;
    }

    /**
     * @param array $contents
     * @return $this
     */
    public function addStringElements(array $contents): self
    {
        array_push($this->contents, ...$contents);

        return $this;
    }

    /**
     * @return string
     */
    protected function getOpenTag(): string
    {
        return sprintf('<ul %s>', $this->getStyleProperties());
    }

    /**
     * @return string
     */
    protected function getContent(): string
    {
        $contents = [];

        foreach ($this->contents as $content) {
            $contents[] = sprintf('<li>%s</li>', $content);
        }

        return implode($contents);
    }



    /**
     * @return string
     */
    protected function getCloseTag(): string
    {
        return '</ul>';
    }
}
