<?php

namespace App;


use App\model\AbstractElement;

class DocumentGenerator
{
    /**
     * @var AbstractElement[]
     */
    private array $stack = [];

    /**
     * @param AbstractElement $element
     * @return void
     */
    public function addElement(AbstractElement $element): void
    {
        $this->stack[] = $element;
    }

    /**
     * @param AbstractElement[] $elements
     * @return void
     */
    public function addElements(array $elements): void
    {
        array_push($this->stack, ...$elements);
    }

    /**
     * @return void
     */
    public function render(): void {
        foreach ($this->stack as $element) {
           echo $element->render();
        }
    }

}