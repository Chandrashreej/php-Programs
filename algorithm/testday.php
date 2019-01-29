<?php 
// PHP program to find 
// day of a given date 
function dayofweek($d, $m, $y) 
{ 
    static $t = array(0, 3, 2, 5, 0, 3, 5, 1, 4, 6, 2, 4); 
    $y = $y - $m < 3; 
    return ($y + $y / 4 - $y / 100 +  $y / 400 + $t[$m - 1] + $d) % 7; 
} 
  
// Driver Code 
$day = dayofweek(17, 1, 2019); 
echo $day; 
  
// This code is contributed by mits. 
?> 