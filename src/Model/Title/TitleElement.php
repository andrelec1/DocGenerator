<?php

namespace DocGenerator\Model\Title;

use DocGenerator\Model\AbstractElement;
use DocGenerator\Properties\StyleProperties\HasPadding;
use DocGenerator\Properties\StyleProperties\HasTextAlign;
use DocGenerator\Properties\StyleProperties\HasTextColor;
use DocGenerator\Properties\HasTitleSize;
use DocGenerator\Properties\StyleProperties\HasTextDecoration;

class TitleElement extends AbstractElement
{
    use HasTextAlign, HasTextColor, HasTitleSize, HasTextDecoration, HasPadding;

    /**
     * @return array
     */
    protected function getStyle(): array
    {
        return [
            $this->getTextAlignStyle(),
            $this->getTextColorStyle(),
            $this->getDecorationStyle(),
            $this->getPaddingStyle(),
        ];
    }

    /** @var string  */
    private string $title;

    /**
     * @param string $title
     */
    public function __construct(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    protected function getOpenTag(): string
    {
        return sprintf('<%s %s>', $this->_titleSize->value, $this->getStyleProperties());
    }

    /**
     * @return string
     */
    protected function getContent(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    protected function getCloseTag(): string
    {
        return sprintf('</%s>', $this->_titleSize->value);
    }
}
