<?php

namespace App\model;

class TitleElement extends AbstractElement
{

    const SIZE_H1 = 'h1';
    const SIZE_H2 = 'h2';
    const SIZE_H3 = 'h3';
    const SIZE_H4 = 'h4';
    const SIZE_H5 = 'h5';
    const SIZE_H6 = 'h6';

    /**
     * @var string
     */
    private string $title;

    /**
     * @var string
     */
    private string $size;

    /**
     * @param string $title
     * @param string $size
     */
    public function __construct(string $title, string $size = self::SIZE_H1)
    {
        $this->title = $title;
        $this->size = $size;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return sprintf('<%s>%s</%s>', $this->size, $this->title, $this->size);
    }
}