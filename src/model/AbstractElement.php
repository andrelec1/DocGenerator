<?php

namespace App\model;

abstract class AbstractElement
{
    /**
     * @return string
     */
    abstract public function render(): string;
}