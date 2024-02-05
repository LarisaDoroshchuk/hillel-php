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


///////////////////////  Помилки PSR стандартів

//на вказано для строгої типизації - declare(strict_types=1);

const app_dir = __DIR__ . '/'; //  назва маленькими буквами

require_once app_dir.'services/printtext.php'; //  назва маленькими буквами, все без пробілов
require_once APP_DIR.'services/PrintTextUpperCase.php'; //  назва маленькими буквами, все без пробілов

$pr = new printtext();  // не зрозуміла назва, назва класа з маленької букви.
$pr->print();   // не зрозуміла назва
echo(PHP_EOL);

$pt = new printttt();    // не зрозуміла назва  класса і змінної
$pt->print();    // не зрозуміла назва
echo(PHP_EOL);

