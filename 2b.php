<?php
include "helpers.php";
//$input = file('inputs/test/2.txt');
$input = file('inputs/2.txt');

$forward = 0;
$depth = 0;
$aim = 0;
foreach($input as $index => $line){
    [$direction, $amount] = explode(' ', $line);
    switch ($direction){
        case 'up':
            $aim -= (int)$amount;
            break;
        case 'down':
            $aim += (int)$amount;
            break;
        case 'forward':
            $forward += (int)$amount;
            $depth += $aim * (int)$amount;
    }
}
echo $depth * $forward;
