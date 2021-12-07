<?php
include "helpers.php";
$input = file_get_contents('inputs/test/7.txt');
$input = file_get_contents('inputs/7.txt');
$input = explode(',', $input);

$leastFuel = PHP_INT_MAX;

for ($i = min($input); $i < max($input); $i++) {
    $leastFuel = min($leastFuel, calculateFuel($i, $input));
}
echo $leastFuel;

function additorial($number)
{
    return (($number * $number) + $number) / 2;
}

function calculateFuel($i, $input)
{

    return array_reduce($input, function ($carry, $item) use ($i) {
        return $carry + additorial(abs($item - $i));
    });
}
