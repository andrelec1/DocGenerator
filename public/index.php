<?php

use App\DocumentGenerator;
use App\Enum\TextAlign;
use App\Enum\TextDecoration;
use App\Model\Title\TitleElement;

require dirname(__DIR__).'/vendor/autoload.php';

$document = new DocumentGenerator();

$document->addElement((new TitleElement('Doc Generator'))
    ->textAlign(TextAlign::CENTER)
    ->textDecorationStyle(TextDecoration::UNDERLINE_WAVY)
);



$document->render();
