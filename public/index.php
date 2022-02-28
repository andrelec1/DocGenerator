<?php

use DocGenerator\ContentModifier\PaginationModifier;
use DocGenerator\DocumentGenerator;
use DocGenerator\Enum\Align;
use DocGenerator\Enum\TextAlign;
use DocGenerator\Enum\TextDecoration;
use DocGenerator\Enum\TitleSize;
use DocGenerator\Model\Code\PHPCodeElement;
use DocGenerator\Model\Code\SimpleCodeBlockElement;
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
    ->padding(1)
    ->addContentModifier($paginationMainMenu)
);

$document->addElement((new TitleElement('List Model'))
    ->titleSize(TitleSize::H2)
    ->textDecorationStyle(TextDecoration::UNDERLINE)
    ->padding(1)
    ->addContentModifier($paginationMainMenu)
);


$paginationModel = new PaginationModifier($paginationMainMenu);
$document->addElement((new TitleElement('TitleElement'))
    ->titleSize(TitleSize::H3)
    ->textDecorationStyle(TextDecoration::UNDERLINE)
    ->padding(2)
    ->addContentModifier($paginationModel)
);
$document->addElement((new SimpleTextElement('Adding TitleElement to your document.'))
    ->padding(3)
);
$document->addElement((new SimpleCodeBlockElement('
$document->addElement((new TitleElement(\'TitleElement\'))
    ->titleSize(TitleSize::H3)
    ->textDecorationStyle(TextDecoration::UNDERLINE)
);
'))
    ->padding(3)
);

$document->addElement((new TitleElement('SimpleTextElement'))
    ->titleSize(TitleSize::H3)
    ->textDecorationStyle(TextDecoration::UNDERLINE)
    ->padding(2)
    ->addContentModifier($paginationModel)
);
$document->addElement((new SimpleTextElement('Adding SimpleTextElement to your document.'))
    ->padding(3)
);
$document->addElement((new SimpleCodeBlockElement('
$document->addElement((new SimpleTextElement(
    \'Adding SimpleTextElement to your document.\'
)));
'))
    ->padding(3)
);

$document->addElement((new TitleElement('SimpleCodeBlockElement'))
    ->titleSize(TitleSize::H3)
    ->textDecorationStyle(TextDecoration::UNDERLINE)
    ->padding(2)
    ->addContentModifier($paginationModel)
);
$document->addElement((new SimpleTextElement('Adding SimpleCodeBlockElement to your document.'))
    ->padding(3)
);
$document->addElement((new SimpleCodeBlockElement('
$document->addElement((new SimpleCodeBlockElement(\'
        \\\\ Your code ...
\'))
    ->padding(3)
);
'))
    ->padding(3)
);

$document->addElement((new TitleElement('PHPCodeElement'))
    ->titleSize(TitleSize::H3)
    ->textDecorationStyle(TextDecoration::UNDERLINE)
    ->padding(3)
    ->addContentModifier($paginationModel)
);

$document->addElement((new PHPCodeElement(<<<PHP
echo PHP_VERSION;

if ("cli" === PHP_SAPI) {
    print "Salut";
}
PHP))
    ->align(Align::LEFT)
    ->padding(3)
);

$document->addElement((new TitleElement('SimpleListElement'))
    ->titleSize(TitleSize::H3)
    ->padding(3)
    ->textDecorationStyle(TextDecoration::UNDERLINE)
    ->addContentModifier($paginationModel)
);

$document->addElement((new SimpleListElement())
    ->addStringElements(['Element 1', 'Element 2'])
    ->padding(3)
);

$document->addElement((new SimpleCodeBlockElement('
$document->addElement((new SimpleListElement())
    ->addStringElements([\'Element 1\', \'Element 2\']));
'))
    ->padding(3)
);

$document->addElement((new TitleElement('List Modifier'))
    ->titleSize(TitleSize::H2)
    ->textDecorationStyle(TextDecoration::UNDERLINE)
    ->padding(2)
    ->addContentModifier($paginationMainMenu)
);

$paginationModifier = new PaginationModifier($paginationMainMenu);
$document->addElement((new TitleElement('PaginationModifier'))
    ->titleSize(TitleSize::H3)
    ->textDecorationStyle(TextDecoration::UNDERLINE)
    ->padding(3)
    ->addContentModifier($paginationModifier)
);
$document->addElement((new SimpleTextElement('Adding Number auto incremente before title, the object can take another PaginationModifier as argument for prefixing.'))
    ->padding(4)
);

$document->render();
