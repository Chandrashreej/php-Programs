<?php

function swap($a, $i, $j) 
{ 
    $temp; 
    $charArray = str_split($a); 
    $temp = $charArray[$i] ; 
    $charArray[$i] = $charArray[$j]; 
    $charArray[$j] = $temp; 
    echo $charArray;
    return implode($charArray); 
} 
  swap("hey",0,7);
?>