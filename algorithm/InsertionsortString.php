<?php
/*********************************Insertion sort for String***************************************/
/**
 *
 * @author chandrashree j
 * @since 09-01-2019
 */
    require 'Util.php';
    
    echo "Insertion sort for String\n";

    echo "Enter the length of array: \n";
    $num =  Util::taking_num_input();
    $z =0;

    while($num == 0)
    {
        echo "Enter the length greater than 0: \n";
        $num =  Util::taking_num_input();
    }

    $arr = array();
    
    while($num != sizeof($arr))
    {
        echo "Enter the values for array: \n";
        $txt =  Util::taking_string_input();
        $arr[$z]=$txt;
        $z++;
    }
    /* method calling from util class */
    Util::insertion_sort_for_str($arr,$num);
?>