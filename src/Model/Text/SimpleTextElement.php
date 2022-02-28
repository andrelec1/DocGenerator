<?php

namespace DocGenerator\Model\Text;

use DocGenerator\Model\AbstractElement;
use DocGenerator\Properties\StyleProperties\HasTextAlign;
use DocGenerator\Properties\StyleProperties\HasTextColor;
use DocGenerator\Properties\HasTitleSize;
use DocGenerator\Properties\StyleProperties\HasTextDecoration;

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
