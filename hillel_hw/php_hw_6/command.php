<?php
declare(strict_types=1);

function multiplication(
    int      $operandFirst,
    int      $operandSecond,
    callable $function = null)
{

    $result = $operandFirst * $operandSecond;

    if (is_callable($function)) {
        $function($result);
    } else {
        return $result . PHP_EOL;
    }
}

$closure = function ($result) {
    echo $result . PHP_EOL;
};


multiplication(2,2,$closure);

echo(multiplication(2,3));
