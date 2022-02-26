<?php

namespace App\Model\Title;

use App\Model\AbstractElement;
use App\Properties\StyleProperties\HasTextAlign;
use App\Properties\StyleProperties\HasTextColor;
use App\Properties\HasTitleSize;

class TitleElement extends AbstractElement
{
    use HasTextAlign, HasTextColor, HasTitleSize;

    /**
     * @return array
     */
    protected function getStyle(): array
    {
        return [
            $this->getTextAlignStyle(),
            $this->getTextColorStyle(),
        ];
    }

    /**
     * @var string
     */
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
