<?php

namespace DocGenerator\ContentModifier;

abstract class AbstractContentModifier
{
    /**
     * @param string $original
     * @return string
     */
    abstract public function apply(string $original): string;
}
