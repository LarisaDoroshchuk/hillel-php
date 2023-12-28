<?php

function calc(float $operandFirst, float $operandSecond, $c){
    if($operandSecond == 0){
        return "You can't divide by zero!";
    }

    switch ($c) {
        case '+':
            return  $operandFirst + $operandSecond;
            break;
        case '-':
            return  $operandFirst - $operandSecond;
            break;
        case '/':
            return  $operandFirst / $operandSecond;
            break;
        case '*':
            return  $operandFirst * $operandSecond;
            break;
        default:
            return "enter arithmetic signs - '+', '-', '/', '*'";
    }
}

echo(calc(5, 6, '/') . "\n" );
