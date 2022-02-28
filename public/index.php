<?php

use DocGenerator\ContentModifier\PaginationModifier;
use DocGenerator\DocumentGenerator;
use DocGenerator\Enum\Align;
use DocGenerator\Enum\TextAlign;
use DocGenerator\Enum\TextDecoration;
use DocGenerator\Enum\TitleSize;
use DocGenerator\Model\Code\PHPCodeElement;
use DocGenerator\Model\List\SimpleListElement;
use DocGenerator\Model\Text\SimpleTextElement;
use DocGenerator\Model\Title\TitleElement;

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

$document->addElement((new TitleElement('Utilisation'))
    ->titleSize(TitleSize::H2)
    ->textDecorationStyle(TextDecoration::UNDERLINE)
    ->addContentModifier($paginationMainMenu)
);

$document->addElement((new TitleElement('List Model'))
    ->titleSize(TitleSize::H2)
    ->textDecorationStyle(TextDecoration::UNDERLINE)
    ->addContentModifier($paginationMainMenu)
);


$paginationModel = new PaginationModifier($paginationMainMenu);
$document->addElement((new TitleElement('TitleElement'))
    ->titleSize(TitleSize::H3)
    ->textDecorationStyle(TextDecoration::UNDERLINE)
    ->addContentModifier($paginationModel)
);
$document->addElement((new SimpleTextElement('Adding \'TitleElement\' to your document.')));
$document->addElement((new PHPCodeElement('$document->addElement((new TitleElement(\'Doc Generator\'))'))
    ->align(Align::LEFT)
);

$document->addElement((new TitleElement('PHPCodeElement'))
    ->titleSize(TitleSize::H3)
    ->textDecorationStyle(TextDecoration::UNDERLINE)
    ->addContentModifier($paginationModel)
);

$document->addElement((new PHPCodeElement(<<<PHP
echo PHP_VERSION;

if ("cli" === PHP_SAPI) {
    print "Salut";
}
PHP))
    ->align(Align::LEFT)
);

$document->addElement((new TitleElement('SimpleListElement'))
    ->titleSize(TitleSize::H3)
    ->textDecorationStyle(TextDecoration::UNDERLINE)
    ->addContentModifier($paginationModel)
);

$document->addElement((new SimpleListElement())
    ->addStringElements(['Element 1', 'Element 2']));

$document->addElement((new PHPCodeElement('
$document->addElement((new SimpleListElement())
    ->addStringElements([\'Element 1\', \'Element 2\']));
'))
    ->align(Align::LEFT)
);

$document->addElement((new TitleElement('List Modifier'))
    ->titleSize(TitleSize::H2)
    ->textDecorationStyle(TextDecoration::UNDERLINE)
    ->addContentModifier($paginationMainMenu)
);

$paginationModifier = new PaginationModifier($paginationMainMenu);
$document->addElement((new TitleElement('PaginationModifier'))
    ->titleSize(TitleSize::H3)
    ->textDecorationStyle(TextDecoration::UNDERLINE)
    ->addContentModifier($paginationModifier)
);

$document->render();
