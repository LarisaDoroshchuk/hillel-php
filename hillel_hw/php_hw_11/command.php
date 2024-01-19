<?php
declare(strict_types=1);

function argumentsUser(): void
{

    $file = fopen("arguments.txt", "a+");

    for ($i = 1; $i <= 3; $i++) {
        echo("Enter your number: № " . $i . ' =  ');
        $operand = trim(fgets(STDIN));
        fwrite($file, $operand . "\n");
    }
    fclose($file);
}

argumentsUser();


//Option#1 - getLastArguments
function getLastArguments(): string
{
    $resource = 'arguments.txt';
    if (file_exists($resource)) {
        $content = file($resource);
        $endArgResource = end($content);
        return trim($endArgResource);
    }
}

echo('Option#1 - getLastArguments:   ' . getLastArguments() . PHP_EOL);


//Option#2 - getLastArguments_2

function getLastArguments_2(string $logFilePath): Generator
{

    $file = fopen($logFilePath, 'r');

    fseek($file, 0, SEEK_END);

    $lastLine = '';
    $char = '';

    while ($char !== false && $char !== "\n") {
        fseek($file, -2, SEEK_CUR);
        $char = fread($file, 1);
        $lastLine = $char . $lastLine;
    }

    fclose($file);
    foreach (array_reverse(explode(' ', trim($lastLine))) as $argument) {
        yield $argument;
    }
}


$logFilePath = 'arguments.txt';

foreach (getLastArguments_2($logFilePath) as $argument) {
    echo 'Option#2 - getLastArguments_2:   ' . $argument . PHP_EOL;
}
