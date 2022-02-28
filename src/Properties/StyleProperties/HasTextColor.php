<?php

namespace DocGenerator\Properties\StyleProperties;


use DocGenerator\Enum\TextColor;

trait HasTextColor
{
    private TextColor $_textColor = TextColor::BLACK;

    /**
     * @param TextColor $textColor
     * @return $this
     */
    public function textColor(TextColor $textColor = TextColor::BLACK): self
    {
        $this->_textColor = $textColor;

        return $this;
    }

    /**
     * @return string
     */
    private function getTextColorStyle(): string
    {
        return sprintf('color: %s;', $this->_textColor->value);
    }
}
