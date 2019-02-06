<?php
/**
 * program to find Binary Search of a Tree
 
 *@author chandrashreej
 *@since 9/01/2019
 */

/**
 * requried to get input from another class
 */
require 'Utilds.php';
echo "enter the number of nodes  of a Tree\n";
$num = Utilds::taking_Num_Input();
/**
 * calculating $numerator value of formulea
 */
$numerator = Utilds::factorial(2 * $num);

/**
 * calculating  $denominator  vlaue of formulea
 */
$denominator = Utilds::factorial($num + 1) * Utilds::factorial($num);

/**
 * calculating number of nodes
 */
$bnryTree = floor($numerator / $denominator);
echo "number of Binary search Tree are possible are \n" . $bnryTree . "\n";