<?php

use App\ContentModifier\PaginationModifier;
use App\DocumentGenerator;
use App\Enum\Align;
use App\Enum\TextAlign;
use App\Enum\TextDecoration;
use App\Enum\TitleSize;
use App\Model\Code\PHPCodeElement;
use App\Model\Title\TitleElement;

require dirname(__DIR__).'/vendor/autoload.php';

$document = new DocumentGenerator();

$document->addElement((new TitleElement('Doc Generator'))
    ->textAlign(TextAlign::CENTER)
    ->textDecorationStyle(TextDecoration::UNDERLINE_WAVY)
);

$paginationMainMenu = new PaginationModifier();

$document->addElement((new TitleElement('Presentation'))
    ->titleSize(TitleSize::H2)
    ->textDecorationStyle(TextDecoration::UNDERLINE)
    ->addContentModifier($paginationMainMenu)
);


$document->addElement((new PHPCodeElement(<<<PHP
echo PHP_VERSION;

if ("cli" === PHP_SAPI) {
    print "Salut";
}
PHP))
    ->align(Align::LEFT)
);

$document->addElement((new TitleElement('Utilisation'))
    ->titleSize(TitleSize::H2)
    ->textDecorationStyle(TextDecoration::UNDERLINE)
    ->addContentModifier($paginationMainMenu)
);

$document->render();
