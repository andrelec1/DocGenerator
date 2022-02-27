<?php

use App\DocumentGenerator;
use App\Enum\Align;
use App\Enum\TextAlign;
use App\Enum\TextColor;
use App\Enum\TitleSize;
use App\Model\Code\PHPCodeElement;
use App\Model\Title\TitleElement;

require dirname(__DIR__).'/vendor/autoload.php';

$document = new DocumentGenerator();

$document->addElement(new TitleElement('Best Title of the world !!!!'));
$document->addElement((new TitleElement('Best SubTitle of the world !!!!'))
    ->titleSize(TitleSize::H2)
);

$document->addElement((new TitleElement('Best SubTitle of the world !!!!'))
    ->titleSize(TitleSize::H4)
    ->textAlign(TextAlign::CENTER)
    ->textColor(TextColor::BLUE)
);

$document->addElement((new PHPCodeElement(<<<PHP
echo PHP_VERSION;

if ("cli" === PHP_SAPI) {
    print "Salut";
}
PHP))
    ->align(Align::LEFT)
);

$document->render();
