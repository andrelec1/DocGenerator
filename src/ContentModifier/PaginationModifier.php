<?php

namespace App\ContentModifier;

class PaginationModifier extends AbstractContentModifier
{
    /** @var int  */
    private int $count;

    private ?PaginationModifier $parent;

    /**
     * @param PaginationModifier|null $parent
     * @param int $countStart
     */
    public function __construct(PaginationModifier $parent = null, int $countStart = 1)
    {
        $this->parent = $parent;
        $this->count = $countStart - 1;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->count;
    }

    /**
     * @return string
     */
    public function getPrefix(): string
    {
        return sprintf('%d.', $this->parent->getValue());
    }

    /**
     * @param string $original
     * @return string
     */
    public function apply(string $original): string
    {
        $this->count += 1;

        if ($this->parent instanceof PaginationModifier) {
            return sprintf('%s%d: %s',$this->getPrefix(),  $this->count, $original);
        }

        return sprintf('%d: %s', $this->count, $original);
    }
}
