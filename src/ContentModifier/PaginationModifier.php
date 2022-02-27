<?php

namespace App\ContentModifier;

class PaginationModifier extends AbstractContentModifier
{
    /** @var int  */
    private int $count = 0;

    /**
     * @param string $original
     * @return string
     */
    public function apply(string $original): string
    {
        $this->count += 1;
        return sprintf('%d: %s', $this->count, $original);
    }
}
