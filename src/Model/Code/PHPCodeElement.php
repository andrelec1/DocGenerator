<?php

namespace DocGenerator\Model\Code;

use DocGenerator\Model\AbstractElement;
use DocGenerator\Properties\StyleProperties\HasAlign;
use DocGenerator\Properties\StyleProperties\HasPadding;

class PHPCodeElement extends AbstractElement
{

    use HasAlign, HasPadding;

    public function __construct(
        protected string $content,
    ) { }

    protected function getOpenTag(): string
    {
        return sprintf("<div %s>", $this->getStyleProperties());
    }

    protected function getContent(): string
    {
        if (!str_starts_with($this->content, "<?php")) {
            $content = "<?php\n" . $this->content;
            $content = highlight_string($content, true);

            return preg_replace("/<span style=\"color: #[a-fA-F0-9]{0,6}\">&lt;\?php<br \/><\/span>/", "", $content);
        }

        return highlight_string($this->content, true);
    }

    protected function getCloseTag(): string
    {
        return "</div>";
    }

    protected function getStyle(): array
    {
        return [
            $this->getAlignStyle(),
            $this->getPaddingStyle(),
        ];
    }
}
