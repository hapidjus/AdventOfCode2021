<?php

CONST PE = PHP_EOL;

function dd($input){
	var_dump($input);
	die();
}
function pause() {
    $handle = fopen ("php://stdin","r");
    do { $line = fgets($handle); } while ($line == '');
    fclose($handle);
    return $line;
}