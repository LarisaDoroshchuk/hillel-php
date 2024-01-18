<?php
declare(strict_types=1);

function fibonacci(int $n): int
{
    $fib = [0, 1];

    for ($i = 2; $i <= $n; $i++) {
        $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
    }

    return $fib[$n];
}

//echo(fibonacci(10));


function generatorFibonacciNumber(int $maxNumber): Generator
{
    $i = 0;
    do {
        $fibonacciNumber = fibonacci($i);
        if ($fibonacciNumber >= $maxNumber) {
            return;
        }
        yield $fibonacciNumber;
        $i++;
    } while (true);
}

$generatorFibonacci = generatorFibonacciNumber(20000);

foreach ($generatorFibonacci as $value) {
    echo $value . PHP_EOL;
};


