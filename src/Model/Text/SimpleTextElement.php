<?php

namespace App\Model\Text;

use App\Model\AbstractElement;
use App\Properties\StyleProperties\HasTextAlign;
use App\Properties\StyleProperties\HasTextColor;
use App\Properties\HasTitleSize;
use App\Properties\StyleProperties\HasTextDecoration;

class SimpleTextElement extends AbstractElement
{
    use HasTextAlign, HasTextColor, HasTextDecoration;

    /**
     * @return array
     */
    protected function getStyle(): array
    {
        return [
            $this->getTextAlignStyle(),
            $this->getTextColorStyle(),
            $this->getDecorationStyle(),
        ];
    }

    /** @var string  */
    private string $text;

    /**
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    protected function getOpenTag(): string
    {
        return sprintf('<p %s>', $this->getStyleProperties());
    }

    /**
     * @return string
     */
    protected function getContent(): string
    {
        return $this->text;
    }

    /**
     * @return string
     */
    protected function getCloseTag(): string
    {
        return '</p>';
    }
}
