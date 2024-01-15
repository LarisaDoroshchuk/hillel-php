<?php
declare(strict_types=1);

function randArr(int $length, int $min = 1, int $max = 99): array
{
    $arr = [];
    for ($i = 0; $i < $length; $i++) {
        $arr[$i] = rand($min, $max);
    }
    return $arr;
}

$randomArr = randArr(7);
var_dump($randomArr);


function sumElemArr(array $arr)
{
    $sum = 0;
    foreach ($arr as $value) {
        $sum += $value;
    }
    return $sum;
}

echo("sum = " . sumElemArr($randomArr) . PHP_EOL);


function multiplicationArr(array $arr)
{
    $multiplication = true;
    foreach ($arr as $value) {
        $multiplication *= $value;

    }
    return $multiplication === true ? 0 : $multiplication;
}

echo("multiplication = " . multiplicationArr($randomArr) . PHP_EOL);


function countFive($arr): int
{
    $result = 0;
    foreach ($arr as $value) {
        foreach (str_split(strval($value)) as $digit) {
            if ($digit === '5') {
                $result++;
            }
        }
    }
    return $result;
}

echo("countFive = " . countFive($randomArr) . PHP_EOL);


function divisibleByThree($arr): array
{
    $result = [];
    foreach ($arr as $value) {
        if ($value % 3 === 0) {
            $result[] = $value;
        }
    }
    return $result;
}

echo('divisibleByThree: ');
var_dump(divisibleByThree($randomArr));
