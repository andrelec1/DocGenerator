<?php

use App\DocumentGenerator;
use App\model\TitleElement;

require dirname(__DIR__).'/vendor/autoload.php';

$document = new DocumentGenerator();

$document->addElement(new TitleElement('Best Title of the world !!!!'));
$document->addElement(new TitleElement('Best subTitle of the world !!!!', TitleElement::SIZE_H2));

$document->render();