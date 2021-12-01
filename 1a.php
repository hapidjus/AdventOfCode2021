<?php
include "helpers.php";
//$input = file('inputs/test/1a.txt');
$input = file('inputs/1a.txt');

$increases = 0;
$last = null;
foreach($input as $index1 => $line1){
    if($last != null && (int)$line1 > $last){
        $increases++;
    }
    $last = (int)$line1;
}
echo $increases;