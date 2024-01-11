<?php
declare(strict_types=1);

define('PI', 3.14);
function areaCircle(int|float $radius) : int|float
{
    return PI*($radius**2);
}
echo( 'areaCircle  - ' . areaCircle(3) .  PHP_EOL);


function exponentiation(int|float $numberUser, int $degree) : int|float
{
    return $numberUser**$degree;
}
echo( 'exponentiation  -  ' . exponentiation(3, 3) .  PHP_EOL);


function returnNewNumber(int $operandFirst, int &$operandSecond) : int
{
   return $operandSecond += $operandFirst;
}
$operandSecond = 4;
echo ( '$operandSecond  -  ' . $operandSecond .  PHP_EOL);
echo ( 'returnNewNumber  -  ' . returnNewNumber(7,  $operandSecond) .  PHP_EOL);
echo ( '$operandSecond  -  ' . $operandSecond .  PHP_EOL);
