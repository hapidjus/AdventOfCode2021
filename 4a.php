<?php
include "helpers.php";
$input = file_get_contents('inputs/test/4.txt');
$input = file_get_contents('inputs/4.txt');

$input = str_replace('  ', ' ', $input);
$boards = explode(PE . PE , $input);
$drawnNumbers = array_shift($boards);

foreach($boards as $boardIndex => $board) {
    foreach(explode(PE, $board) as $index =>  $line){
        $boardArrays[$boardIndex][$index] = explode(' ', trim($line));
    }
}

foreach(explode(',', $drawnNumbers) as  $drawnNumber) {
    markBoards($boardArrays, $drawnNumber);
    foreach ($boardArrays as $boardIndex => $board){
        if(checkBoard($board)){
            echo calculateScore($board) * $drawnNumber;
            die();
        }

    }
};

function calculateScore($board)
{
    $sum = 0;
    foreach ($board as $line) {
        foreach ($line as $number) {
            if($number != 'x'){
                $sum += $number;
            }
        }
    }
    return $sum;
}

function checkBoard($board)
{
    return (bool)count(array_filter($board, function($line) use($board){
        if(implode($line) == 'xxxxx'){
            return true;
        }
        for ($i = 1; $i < 5; $i++) {
            if($board[0][$i] . $board[1][$i] . $board[2][$i] . $board[3][$i] .$board[4][$i] == 'xxxxx'){
                return true;
            }
        }
        return false;
    }));
}

function markBoards(&$boards, $drawnNumber){
    foreach($boards as $boardIndex => $board){
        foreach($board as $rowIndex => $line){
            foreach($line as $colIndex => $number){
                if($number == $drawnNumber){
                    $boards[$boardIndex][$rowIndex][$colIndex] = 'x';
                }
            }
        }
    }
}
