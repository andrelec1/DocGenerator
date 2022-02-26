<?php

namespace App;


use App\Model\AbstractElement;
use ReflectionException;

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
     * @throws ReflectionException
     */
    public function render(): void {
        foreach ($this->stack as $element) {
            // Use protected function for avoid render() listing in auto-completion
            $reflectionMethod = new \ReflectionMethod(get_class($element), 'render');
            $reflectionMethod->setAccessible(true);
            echo $reflectionMethod->invoke($element);
        }
    }

}
