<?php

namespace App\Properties\StyleProperties;

use App\Enum\Align;

trait HasAlign
{
    protected Align $align = Align::LEFT;

    public function align(Align $align): self {
        $this->align = $align;

        return $this;
    }

    protected function getAlignStyle(): string {
        return sprintf("display: flex; justify-content: %s", match ($this->align) {
            Align::CENTER => "center",
            Align::RIGHT => "right",
            default => "left",
        });
    }
}