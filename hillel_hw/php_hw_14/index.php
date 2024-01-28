<?php
declare(strict_types=1);

const APP_DIR = __DIR__ . '/';

require_once APP_DIR . 'services/PrintText.php';
require_once APP_DIR . 'services/PrintTextUpperCase.php';

$printText = new PrintText();
$printText->print();
echo(PHP_EOL);

$printTextUpperCase = new PrintTextUpperCase();
$printTextUpperCase->print();
echo(PHP_EOL);
