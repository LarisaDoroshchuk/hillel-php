<?php
declare(strict_types=1);

function showNumbers(): array
{
    $arr = [];
    $i = 1;
    while ($i <= 10) {
        $arr[] = $i;
        $i++;
    }
    return $arr;
}

var_dump(showNumbers());


function factorial(): int
{
    $number = 5;
    $factorial = 1;
    $counter = 1;

    while ($counter <= $number) {
        $factorial *= $counter;
        $counter++;
    }

    return $factorial;
}

echo 'factorial - ' . factorial() . PHP_EOL;


function pairedNumbers(): array
{
    $result = [];
    $i = 1;
    while ($i <= 20) {
        if ($i % 2 === 0) {
            $result[] = $i;
        }
        $i++;
    }
    return $result;
}

var_dump(pairedNumbers());