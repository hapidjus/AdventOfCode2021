<?php
include "helpers.php";
$input = file('inputs/test/3.txt');
$input = file('inputs/3.txt');

$length = strlen(trim($input[0]));
$gamma = '';

for ($i = 0; $i < $length; $i++){
    $ones = 0;
    foreach($input as $line){
        if((int)$line[$i] == 1){
            $ones++;
        }
    }
    if($ones > sizeof($input)/2){
        $gamma.= 1;
    }else{
        $gamma.= 0;
    }
}
echo bindec($gamma) * bindec(strtr($gamma,[1,0]));
