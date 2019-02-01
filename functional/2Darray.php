<?php
/**
 * Program which creates 2D array
 *
 * @author chandrashree j
 * @since 09-01-2019
 */
    include 'Utility.php';
    echo "2 Dimensional Array\n";

    echo "enter the number of rows\n";
    $row =  Utility::takingnuminput();
    
    echo "enter the number of columns\n";
    $column =  Utility::takingnuminput();
    
    
    echo "\n";
    Utility::calling_2Darray($row, $column);
    echo "\n";
?>