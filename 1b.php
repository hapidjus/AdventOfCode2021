<?php
include "helpers.php";
//$input = file('inputs/test/1a.txt');
$input = file('inputs/1a.txt');

$increases = 0;
$last = null;
foreach ($input as $index => $line) {
    if (!isset($input[$index + 2]) || !isset($input[$index + 1])) {
        break;
    }
    $runningTot = (int)$line + (int)$input[$index + 1] + (int)$input[$index + 2];
    if ($last != null && $runningTot > $last) {
        $increases++;
    }
    $last = $runningTot;
}
echo $increases;