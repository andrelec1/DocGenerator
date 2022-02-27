<?php

namespace App\Properties;


use App\Enum\TitleSize;
use App\Model\Title\TitleContentModifier;

trait HasTitleSize
{
    /**
     * @var TitleSize
     */
    private TitleSize $_titleSize = TitleSize::H1;

    /**
     * @param TitleSize $size
     * @return HasTitleSize|TitleContentModifier
     */
    public function titleSize(TitleSize $size = TitleSize::H1): self
    {
        $this->_titleSize = $size;

        return $this;
    }

}
