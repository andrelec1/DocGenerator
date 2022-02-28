<?php

namespace DocGenerator\Properties\StyleProperties;

use DocGenerator\Enum\TextColor;
use DocGenerator\Enum\TextDecoration;

trait HasTextDecoration
{
    private TextDecoration $_textDecorationStyle = TextDecoration::NONE;
    private TextColor $_textDecorationColor = TextColor::DEFAULT;

    /**
     * @param TextDecoration $textDecorationStyle
     * @return $this
     */
    public function textDecorationStyle(TextDecoration $textDecorationStyle = TextDecoration::NONE): self
    {
        $this->_textDecorationStyle = $textDecorationStyle;

        return $this;
    }

    /**
     * @param TextColor $textDecorationColor
     * @return $this
     */
    public function textDecorationColor(TextColor $textDecorationColor = TextColor::DEFAULT): self
    {
        $this->_textDecorationColor = $textDecorationColor;

        return $this;
    }

    /**
     * @param TextDecoration $textDecorationStyle
     * @param TextColor $textDecorationColor
     * @return $this
     */
    public function textDecorationStyleAndColor(TextDecoration $textDecorationStyle = TextDecoration::NONE, TextColor $textDecorationColor = TextColor::DEFAULT): self
    {
        $this
            ->textDecorationStyle($textDecorationStyle)
            ->textDecorationColor($textDecorationColor)
        ;

        return $this;
    }

    /**
     * @return string
     */
    private function getDecorationStyle(): string
    {
        if ($this->_textDecorationColor === TextColor::DEFAULT) {
            return sprintf('text-decoration: %s;', $this->_textDecorationStyle->value);
        }

        return sprintf('text-decoration: %s %s;', $this->_textDecorationStyle->value, $this->_textDecorationColor->value);
    }
}
