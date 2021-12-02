<?php
include "helpers.php";
//$input = file('inputs/test/2.txt');
$input = file('inputs/2.txt');

$forward = 0;
$depth = 0;
foreach($input as $index => $line){
    [$direction, $amount] = explode(' ', $line);
    switch ($direction){
        case 'up':
            $depth -= (int)$amount;
            break;
        case 'down':
            $depth += (int)$amount;
            break;
        case 'forward':
            $forward += (int)$amount;
    }
}
echo $depth * $forward;
