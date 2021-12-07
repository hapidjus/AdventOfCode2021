<?php
include "helpers.php";
$input = file_get_contents('inputs/test/7.txt');
$input = file_get_contents('inputs/7.txt');
$input = explode(',', $input);

echo calculateFuel($input, getMedian($input));

function getMedian($input)
{
    sort($input);
    return $input[count($input) / 2];
}

function calculateFuel($input, $median)
{
    return array_reduce($input, function ($carry, $item) use ($median) {
        return $carry + (abs($item - $median));
    });
}

