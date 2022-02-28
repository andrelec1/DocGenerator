<?php

namespace DocGenerator\Properties\StyleProperties;


trait HasPadding
{
    /** @var int  */
    protected int $_paddingSize = 16;
    /** @var int  */
    protected int $_paddingAmount = 0;

    /**
     * @param int $amount
     * @param int $sizePx
     * @return $this
     */
    public function padding(int $amount = 1, int $sizePx = 16): self
    {
        $this->_paddingAmount = $amount;
        $this->_paddingSize = $sizePx;

        return $this;
    }

    /**
     * @param int $offsetPx
     * @return string
     */
    protected function getPaddingStyle(int $offsetPx = 0): string
    {
        return sprintf("padding-left: %dpx;", $offsetPx + $this->_paddingSize * $this->_paddingAmount);
    }
}
