<?php
include "helpers.php";
$input = file('inputs/test/3.txt');
$input = file('inputs/3.txt');

$ogr = calculate($input,0);
$co2 = calculate($input,1);

echo bindec($ogr) * bindec($co2);

function calculate($input, $mask)
{
    $length = strlen(trim($input[0]));
    for ($i = 0; $i < $length; $i++ ){
        $ones = 0;
        foreach($input as $index1 => $line){
            if((int)$line[$i] == 1){
                $ones++;
            }
        }
        if($ones >= sizeof($input) / 2) {
            $input = filterInput($input, $i, $mask);
        }else{
            $input = filterInput($input, $i, $mask ? '0' : 1);

        }
        if(sizeof($input) == 1){
            return $input[0];
        }
    }
}

function filterInput($input, $bit, $val){
    $retArr = [];
    foreach ($input as $line){
        if((int)$line[$bit] == $val){
            $retArr[] = $line;
        }
    }
    return $retArr;
}
