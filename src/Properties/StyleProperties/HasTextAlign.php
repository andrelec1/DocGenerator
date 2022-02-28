<?php

namespace DocGenerator\Properties\StyleProperties;


use DocGenerator\Enum\TextAlign;

trait HasTextAlign
{
    private TextAlign $_textAlign = TextAlign::LEFT;

    /**
     * @param TextAlign $textAlign
     * @return $this
     */
    public function textAlign(TextAlign $textAlign = TextAlign::LEFT): self
    {
        $this->_textAlign = $textAlign;

        return $this;
    }

    /**
     * @return string
     */
    private function getTextAlignStyle(): string
    {
        return sprintf('text-align: %s;', $this->_textAlign->value);
    }
}
