<?php

namespace DocGenerator\Model\Code;

use DocGenerator\Model\AbstractElement;
use DocGenerator\Properties\StyleProperties\HasPadding;

class SimpleCodeBlockElement extends AbstractElement
{
    use HasPadding;

    public static bool $firstInstance = true;

    /**
     * @return array
     */
    protected function getStyle(): array
    {
        return [
            $this->getPaddingStyle(),
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
        $puceStyle = '';
        if (self::$firstInstance) {
            $puceStyle = '
            <style>
                li.li-code::before {
                    content: counter(li, decimal-leading-zero);
                    color: #666666;
                    padding: 5px;
                    border-right: #666666 solid 1px;
                    margin-right: 14px;
                    margin-left: -9px;
                }
            </style>
            ';
        }

        self::$firstInstance = false;

        return sprintf('%s<div %s><pre>', $puceStyle, $this->getStyleProperties());
    }

    /**
     * @return string
     */
    protected function getContent(): string
    {
        $lines = explode("\n", trim($this->text));

        $lines = implode(array_map(function(string $line) {
            return sprintf('<li class="li-code" style="counter-increment: li">%s</li>', $line);
        }, $lines));

        $style = [
            "display: inline-block;",
            "background-color: #d3d3d3;",
            "padding: 5px 10px;",
            "list-style: none;",
            "counter-reset: li",
            "line-height: 20px;",
        ];


        return sprintf('<ul style="%s">%s</ul>', implode(' ', $style), $lines);
    }

    /**
     * @return string
     */
    protected function getCloseTag(): string
    {
        return '</pre></div>';
    }
}
