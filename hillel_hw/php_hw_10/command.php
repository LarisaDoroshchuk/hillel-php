<?php
declare(strict_types=1);

function generatorFibonacciNumber(int $maxNumber): Generator
{
    $fib = [0, 1];
    $i = 0;

    while ($fib[$i] < $maxNumber) {
        yield $fib[$i];
        $fib[] = $fib[$i] + $fib[$i + 1];
        $i++;
    }
}

$generatorFibonacci = generatorFibonacciNumber(20000);

foreach ($generatorFibonacci as $value) {
    echo $value . PHP_EOL;
}

