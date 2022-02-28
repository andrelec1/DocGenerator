<?php

namespace DocGenerator\Model\List;

use DocGenerator\Model\AbstractElement;

class SimpleListElement extends AbstractElement
{
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
        return '<ul>';
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

    /**
     * @return array
     */
    protected function getStyle(): array
    {
        return  [];
    }
}
