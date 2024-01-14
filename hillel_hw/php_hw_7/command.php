<?php
declare(strict_types=1);

function randArr(int $length, int $min = 1, int $max = 99): array
{
    $arr = [];
    for ($i = 0; count($arr) < $length; $i++) {
        $arr[] = rand($min, $max);
    }
    return $arr;
}

$array = randArr(7);
var_dump($array);


function elemMaxArr($arr): int
{
    $elemMax = $arr[0];
    foreach ($arr as $value) {
        if ($value > $elemMax) {
            $elemMax = $value;
        }
    }
    return $elemMax;
}

echo 'elemMaxArr - ' . elemMaxArr($array) . PHP_EOL;

function elemMinArr($arr): int
{
    $elemMin = $arr[0];
    foreach ($arr as $value) {
        if ($value < $elemMin) {
            $elemMin = $value;
        }
    }
    return $elemMin;
}

echo 'elemMinArr - ' . elemMinArr($array) . PHP_EOL;


function sortArr($arr): array
{
    $lenghtArr = count($arr);

    do {
        $swapped = false;
        for ($i = 0; $i < $lenghtArr - 1; $i++) {

            if ($arr[$i] > $arr[$i + 1]) {
                $tmp = $arr[$i];
                $arr[$i] = $arr[$i + 1];
                $arr[$i + 1] = $tmp;

                $swapped = true;
                $i++;
            }
        }

    } while ($swapped);

    return $arr;

}
echo 'sortArr - ';
var_dump(sortArr($array));